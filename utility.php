<?php

date_default_timezone_set('Africa/Lagos');

session_start();
// error_reporting(0);
// ini_set('display_errors', 0);

if (isset($_SESSION["customer_id"])) {
    $customer_id = $_SESSION["customer_id"];
}

require_once(realpath(dirname(__FILE__)) . '/database/MysqliDb.php');
require_once(realpath(dirname(__FILE__)) . '/database/db.php');


// require_once("database/db.php");
// require_once("database/MysqliDb.php");

try {
    $db = new MysqliDb($host, $dbusername, $dbpassword, $database);
    if (!$db) die("Database error");
    $db->setTrace(true);
    $db->JsonBuilder()->rawQuery("SHOW TABLES");
} catch (exception $e) {
    output_response("error", "Database connection failed", null);
}

function output_response($state, $message, $data)
{
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    $state = $state == strtolower("error") ? 201 : 200;
    $response = array("status" => $state, "message" => $message, "data" => $data);
    http_response_code($state);
    echo json_encode($response);
}

// function validateLoginFormData($email, $password)
// {
//     if (empty($email) || empty($password)) {
//         $_SESSION["error"] =  "Required fields must not be empty";
//         exit();
//     } elseif (strlen($password) < 4) {
//         $_SESSION["error"] = "Password too short";
//         exit();
//     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $_SESSION["error"] = "Invalid email address";
//         exit();
//     } else {
//         $email = trim($email);
//     }
// }

function validateRegisterFormData($firstName, $lastName, $email, $address, $phone, $gender, $maritalStatus, $state, $occupation)
{
    if (empty($firstName) || empty($lastName)) {
        $_SESSION["error"] = "First or Last name fields should not be empty";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = "Invalid e-mail address";
        exit();
    }
    if (empty($address)) {
        $_SESSION["error"] = "Address field should not be empty";
        exit();
    }
    if (empty($phone) || strlen($phone) < 11) {
        $_SESSION["error"] = "Invalid phone number";
        exit();
    }
    if (empty($gender)) {
        $_SESSION["error"] = "Please select a gender";
        exit();
    }
    if (empty($maritalStatus)) {
        $_SESSION["error"] = "Please choose a marital status";
        exit();
    }
    if (empty($state)) {
        $_SESSION["error"] = "Please choose a state";
        exit();
    }
    if (empty($occupation)) {
        $_SESSION["error"] = "Please choose an occupation";
        exit();
    }
}

// function updateDb($value, $table, $column, $where, $where_value)
// {
//     global $db;
//     $result = $db->JsonBuilder()->rawQuery("UPDATE $table SET $column = ? WHERE $where = ?", array($value, $where_value));
// }

function ifValueExists($table, $column, $value)
{
    global $db;
    $existResp = $db->JsonBuilder()->rawQuery("SELECT * FROM $table WHERE $column = ?", array($value));
    $response = json_decode($existResp, true);
    if (!empty($response)) {
        return true;
    } else {
        return false;
    }
}
