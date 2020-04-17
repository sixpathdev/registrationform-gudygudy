<?php

include("./utility.php");
include("./authentication/auth_signup.php");

if (isset($_POST["submit_form"])) {

  $response = auth_signup($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["address"], $_POST["phone"], $_POST["gender"], $_POST["marital_status"], $_POST["state"], $_POST["occupation"]);

  if ($response) {
    $_SESSION["success_message"] = $_SESSION['first_name']. ', you have registered successfully';    
  } else {
    $_SESSION["error_message"] = "Oops something went wrong!";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <link rel="stylesheet" href="custom.css">
</head>

<body style="background: #f5f5f5;">
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 mx-auto mt-5 mb-4 card" style="border-radius: 4px;">
          <div class="card-body">
            <h3 class="text-muted text-center pb-2">Gudy Coop Membership Form</h3>
            <?php if(isset($_SESSION["success_message"])) { ?>
              <div class="alert alert-success text-center" role="alert" id="success_message" style="display: block;"><?php echo $_SESSION["success_message"] ?></div>
            <?php
              echo "<script>setTimeout(function() { document.getElementById('success_message').style.display='none'; }, 2900);</script>";
              unset($_SESSION["success_message"]);
              } elseif (isset($_SESSION["error"])) { ?>
              <h6 class="alert alert-danger text-center" role="alert" id="error" style="display: block;"><?php echo $_SESSION["error"] ?></h6>
            <?php 
                echo "<script>setTimeout(function() { document.getElementById('error').style.display='none'; }, 2900)</script>";
                unset($_SESSION["error"]);
              } ?>
              <form method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="first_name" class="text-muted">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="John" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="last_name" class="text-muted">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Doe" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="text-muted">Email Address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Jdoe@gmail.com" />
                </div>
                <div class="form-group">
                  <label for="address" class="text-muted">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" />
                </div>
                <div class="form-group">
                  <label for="phone" class="text-muted">Phone Number</label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="12345678910" />
                </div>
                <div class="form-row">
                  <div class="form-group col-12 col-md-6">
                    <label for="gender" class="text-muted">Gender</label>
                    <select id="gender" name="gender" class="form-control">
                      <option>Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group col-12 col-md-6">
                    <label for="marital_status" class="text-muted">Marital Status</label>
                    <select id="marital_status" name="marital_status" class="form-control">
                      <option>Choose...</option>
                      <option value="single">Single</option>
                      <option value="married">Married</option>
                      <option value="divorced">divorced</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="state" class="text-muted">State</label>
                  <select class="form-control" name="state" id="state">
                    <option>Choose...</option>
                    <option value="abuja">ABUJA FCT</option>
                    <option value="abia">ABIA</option>
                    <option value="adamawa">ADAMAWA</option>
                    <option value="akwa-ibom">AKWA IBOM</option>
                    <option value="anambra">ANAMBRA</option>
                    <option value="bauchi">BAUCHI</option>
                    <option value="bayelsa">BAYELSA</option>
                    <option class="benue">BENUE</option>
                    <option value="borno">BORNO</option>
                    <option value="cross-river">CROSS RIVER</option>
                    <option value="delta">DELTA</option>
                    <option value="ebonyi">EBONYI</option>
                    <option value="edo">EDO</option>
                    <option value="ekiti">EKITI</option>
                    <option value="enugu">ENUGU</option>
                    <option value="gombe">GOMBE</option>
                    <option value="imo">IMO</option>
                    <option value="jigawa">JIGAWA</option>
                    <option value="kaduna">KADUNA</option>
                    <option value="kano">KANO</option>
                    <option value="katsina">KATSINA</option>
                    <option value="kebbi">KEBBI</option>
                    <option value="kogi">KOGI</option>
                    <option value="kwara">KWARA</option>
                    <option value="lagos">LAGOS</option>
                    <option value="nassarawa">NASSARAWA</option>
                    <option value="niger">NIGER</option>
                    <option value="ogun">OGUN</option>
                    <option value="ondo">ONDO</option>
                    <option value="osun">OSUN</option>
                    <option value="oyo">OYO</option>
                    <option value="plateau">PLATEAU</option>
                    <option value="rivers">RIVERS</option>
                    <option value="sokoto">SOKOTO</option>
                    <option value="taraba">TARABA</option>
                    <option value="yobe">YOBE</option>
                    <option value="zamfara">ZAMFARA</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="occupation" class="text-muted">Occupation</label>
                  <input type="text" class="form-control" id="occupation" name="occupation" placeholder="e.g Trader" />
                </div>
                <button type="submit" name="submit_form" class="btn btn-primary w-100">Sign up</button>
              </form>
              <div class="text-muted text-center mt-4 mb-2">Gudy-Gudy Cooperative Investment and Credit Society Limited.</div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>

</html>