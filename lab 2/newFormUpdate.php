<?php

    $id     = $_GET["id"];
    $f_name = $_GET["f_name"];
    $l_name = $_GET["l_name"];
    $gender = $_GET["gender"];
    if($gender == "Male ")
    {
        $gender='Male';
    }
    else
    {
        $gender='Female';
    }
    $email  = $_GET["email"];
 
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
            Update Data
        </div>
        <form class="p-3 mt-3" action="edituser.php?id=<?php echo $id; ?> " method="post">


            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="firstname" id="firstname" placeholder="firstname"
                value="<?php echo $f_name; ?>">
            </div>
        



            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="lastname" id="lastname" placeholder="lastname"
                value="<?php  echo $l_name; ?>">
            </div>



            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <div class=" w-100 p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <input name="Gender" type="radio" id="Male" value="Male" 
                        <?PHP if($gender=='Male') echo 'checked' ; ?> >
                        <label class="form-check-label" for="inlineCheckbox1">Male</label>
                    </div>
                    <div>
                        <input name="Gender" type="radio" id="Female" value="Female"
                        <?PHP if($gender=='Female') echo 'checked' ; ?> >
                        <label class="form-check-label" for="inlineCheckbox1">Female</label>
                    </div>
                </div>
            </div>




            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="email"
                value="<?php  echo $email; ?>">
            </div>


            <input  class="but" type="submit" value="Submit">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <script src="register.js"></script>
</body>

</html>