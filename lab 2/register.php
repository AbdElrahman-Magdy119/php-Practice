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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>

    <div class="wrapper">
        <div class="logo">
            <img src="p.jpeg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Register
        </div>
        <form class="p-3 mt-3" action="registerValidate.php" method="post">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="firstname" id="firstname" placeholder="firstname"
                value="<?php if(isset($old_data['firstname'])) echo $old_data['firstname']; ?>">
            </div>
            <span class="text-danger"> <?php if(isset($errors['firstname'])) echo $errors['firstname']; ?> </span>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="lastname" id="lastname" placeholder="lastname"
                value="<?php if(isset($old_data['lastname'])) echo $old_data['lastname']; ?>">
            </div>
            <span class="text-danger"> <?php if(isset($errors['lastname'])) echo $errors['lastname']; ?> </span>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <textarea id="Address" name="Address" placeholder="Enter Address"></textarea>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <select name="country" class="form-select" aria-label="Default select example">
                    <option selected>Select Country</option>
                    <option value="Cairo">Cairo</option>
                    <option value="Alx">Alx</option>
                    <option value="Assuit">Assuit</option>
                    <option value="Sohag">Sohag</option>
                    <option value="Hurghda">Hurghda</option>
                    <option value="quna">quna</option>
                    <option value="asswan">asswan</option>
                </select>
            </div>


            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <div class=" w-100 p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <input name="Gender" type="radio" id="Male" value="Male"
                        <?PHP if(isset($old_data['Gender'])) print $old_data['Gender'] ?> >
                        <label class="form-check-label" for="inlineCheckbox1">Male</label>
                    </div>
                    <div>
                        <input name="Gender" type="radio" id="Female" value="Female"
                        <?PHP if(isset($old_data['Gender'])) print $old_data['Gender'] ?>>
                        <label class="form-check-label" for="inlineCheckbox1">Female</label>
                    </div>
                </div>
                <span class="text-danger"> <?php if(isset($errors['Gender'])) echo $errors['Gender']; ?> </span>
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <div class=" w-100 p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div>
                            <input name="Skills[]" type="checkbox" id="Php" value="Php">
                            <label class="form-check-label" for="inlineCheckbox1">Php</label>
                        </div>
                        <div>
                            <input name="Skills[]" type="checkbox" id="MySql" value="MySql">
                            <label class="form-check-label" for="inlineCheckbox1">MySql</label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input name="Skills[]" type="checkbox" id="Angular" value="Angular">
                            <label class="form-check-label" for="inlineCheckbox1">Angular</label>
                        </div>
                        <div>
                            <input name="Skills[]" type="checkbox" id="Python" value="Python">
                            <label class="form-check-label" for="inlineCheckbox1">Python</label>
                        </div>
                    </div>
                </div>
            </div>



            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="email"
                value="<?php if(isset($old_data['email'])) echo $old_data['email']; ?>">
            </div>
            <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>


            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text"  id="Department" value="open source" disabled>
                <input type="text" name="Department" id="Department"  value="open source"  placeholder="Department" hidden>
            </div>
           
            
             <input  class="but" type="submit" value="Submit"><br><br>
             <input  class="but" type="reset" value="Reset">
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="#">Sign up</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <script src="register.js"></script>
</body>

</html>