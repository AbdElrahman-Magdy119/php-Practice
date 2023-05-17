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
  <link rel="stylesheet" href="register.css">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>

  <section style="background-color: #eee;width: 100%;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4" action="registerValidate.php" method="post" enctype="multipart/form-data" >


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg  fa-fw "></i>
                      <div class="form-outline flex-fill ">
                        <input class="form-control" type="text" name="Name" placeholder="Name" id="Name"
                        value="<?php if(isset($old_data['Name'])) echo $old_data['Name']; ?>">
                        <span class="text-danger"> <?php if(isset($errors['Name'])) echo $errors['Name']; ?> </span>
                      </div>
                    </div>
                  


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg  fa-fw "></i>
                      <div class="form-outline flex-fill mb-0">
                        <input class="form-control" type="email" name="email"  placeholder="example@example.com" id="email"
                        value="<?php if(isset($old_data['email'])) echo $old_data['email']; ?>">
                        <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg  fa-fw "></i>
                      <div class="form-outline flex-fill mb-0">
                        <input class="form-control" type="password" name="password" placeholder="Password" id="password"
                        value="<?php if(isset($old_data['password'])) echo $old_data['password']; ?>">
                      </div>
                    </div>
                    <span class="text-danger"> <?php if(isset($errors['password'])) echo $errors['password']; ?> </span>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg  fa-fw "></i>
                      <div class="form-outline flex-fill mb-0">
                        <input class="form-control" type="password" name="ConfirmPassword" placeholder="Confirm Password" id="cpassword"
                        value="<?php if(isset($old_data['ConfirmPassword'])) echo $old_data['ConfirmPassword']; ?>">
                        <span class="text-danger"> <?php if(isset($errors['ConfirmPassword'])) echo $errors['ConfirmPassword']; ?> </span>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <img src="door.png" style="width: 2rem;min-height: 2rem">
                      <div class="form-outline flex-fill mb-0">
                        <select name="Room" class="form-select" aria-label="Default select example">
                          <option selected>Select Room_No</option>
                          <option value="Application1">Application1</option>
                          <option value="Application2">Application2</option>
                          <option value="cloud">cloud</option>
                        </select>
                        <!-- ************************************************************************************* -->
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg  fa-fw "></i>
                      <div class="form-outline flex-fill mb-0">
                        <input class="form-control" type="text" name="Ext"  placeholder="Ext" id="Ext">
                        <!-- *************************************************************************** -->
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-regular fa-image  fa-fw " style="font-size: 25px;"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input  type="file" name="image">
                        <!-- **************************************************************************** -->
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <p>Already have an account? </p><a href="login.php">Sign in</a>
                    </div>
 
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Register</button>
                      <button type="reset" class="btn btn-primary btn-lg ms-3">Reset</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="pexels-photo-3768122.jpeg" class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
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