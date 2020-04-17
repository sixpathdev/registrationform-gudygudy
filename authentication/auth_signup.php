<?php

function auth_signup($firstName, $lastName, $email, $address, $phone, $gender, $maritalStatus, $state, $occupation)
{
    validateRegisterFormData($firstName, $lastName, $email, $address, $phone, $gender, $maritalStatus, $state, $occupation);

    global $db;
    $uniqueId = uniqid();
    $emailExist = ifValueExists("customers", "email", $email);
    if ($emailExist == false) {
        $authData = array(
            "customer_id" => $uniqueId,
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            "address" => $address,
            "phone" => $phone,
            "gender" => $gender,
            "marital_status" => $maritalStatus,
            "state" => $state,
            "occupation" => $occupation
        );
        $inserted = $db->insert('customers', $authData);
        if ($inserted) {
            $checkEmailAfterSignup = $db->JsonBuilder()->rawQuery("SELECT * FROM `customers` WHERE email = ?", array($_POST["email"]));
            $checkEmailAfterSignup = json_decode($checkEmailAfterSignup, true);
            $_SESSION["id"] = $checkEmailAfterSignup[0]["id"];
            $_SESSION["customer_id"] = $checkEmailAfterSignup[0]["customer_id"];
            $_SESSION["first_name"] = $checkEmailAfterSignup[0]["first_name"];
            $_SESSION["last_name"] = $checkEmailAfterSignup[0]["last_name"];
            $_SESSION["email"] = $checkEmailAfterSignup[0]["email"];
            $_SESSION["phone"] = $checkEmailAfterSignup[0]["phone"];
        }
        return true;
    } else {
        $_SESSION["error"] = "Email Already Exists...";
        return false;
    }
}
