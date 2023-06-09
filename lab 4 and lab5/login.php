<?php

if(isset($_GET["errors"])){
    $errors = json_decode($_GET["errors"], true);
}
if(isset($_GET["old"])){
    $old_data = json_decode($_GET["old"], true);
}




?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>


<div class="login-page mt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <h3 class="mb-3">Login Now</h3>
        <div class="bg-white shadow rounded">
          <div class="row">
            <div class="col-md-7 pe-0">
              <div class="form-left py-5 px-5">

                <form class="row g-4" action="loginValidate.php" method="post">
                <span class="text-danger"> <?php if(isset($_GET["error"])) echo $_GET["error"]; ?> </span>
                  <div class="col-12">
                    <label>Email<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <div class="input-group-text">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      </div>
                      <input type="text" class="form-control" name="email"  placeholder="Enter Username"
                      value="<?php if(isset($old_data['email'])) echo $old_data['email']; ?>">
                    </div>
                  </div>
                  <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>


                  <div class="col-12">
                    <label>Password<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <div class="input-group-text">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      </div>
                      <input name="password"  type="password" class="form-control"
                        placeholder="Enter Password"
                        value="<?php if(isset($old_data['password'])) echo $old_data['password']; ?>">
                    </div>
                  </div>
                  <span class="text-danger"> <?php if(isset($errors['password'])) echo $errors['password']; ?> </span>


                  <div class="col-12">
                    <button type="submit" 
                      class="btn btn-primary px-4 float-end mt-4">login</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <p>Don't have an account? </p><a href="register.php">Sign Up</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-5 ps-0 d-none d-md-block">
              <div class="form-right  text-white text-center pt-5">
                <img src="pexels-photo-3768122.jpeg"
                  class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
        <p class="text-end text-secondary mt-3">Copyright @team</p>
      </div>
    </div>
  </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
  crossorigin="anonymous"></script>
<script src="register.js"></script>
</body>

</html>