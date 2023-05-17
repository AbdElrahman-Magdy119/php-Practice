<?php

include 'connect_to_db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

   
$p = new Database("localhost","root","1191997","student");

    $name = $_POST["Name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["ConfirmPassword"];



    $errors =[];
    $formdata = [];

    // validate name
    if(empty($name) and isset($name)){
        $errors['Name']='Name is required';
    }
    elseif(strlen($name) < 4 )
    {
        $errors['Name']='Name must be at least 4 characters';
    }
    elseif(strlen($name) > 15)
    {
        $errors['Name']='Name not exceed 15 characters';
    }
    else{
        $formdata["Name"]= $name;
    }
   
   // validate email
    if(empty($email) and isset($email)){
        $errors['email']='email is required';
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email']='email must match example@example.com';
    }
    else{
        $formdata["email"]= $email;
    }
    // $pattern = " /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix" ;
    //  if(preg_match($pattern,$email)){
    //     $errors['email_second_validate']='email must match example@example.com';
    //  }


    // validate password
    $pattern = " /^[a-z -]{8}$/" ;
    if(empty($password) and isset($password)){
        $errors['password']='password is required';
    }
    elseif(!preg_match($pattern,$password)){
       $errors['password']='error password';
    }
    else{
        $formdata["password"]= $password;
    }
   
     // validate confirm_password
    if(empty($confirm_password) and isset($confirm_password)){
        $errors['ConfirmPassword']='ConfirmPassword is required';
    }
    elseif($confirm_password != $password) {
        $errors['ConfirmPassword']='Confirm_Password not matched ';
    }
    else{
        $formdata["ConfirmPassword"]= $confirm_password;
    }


    if($errors){
        $errors_str = json_encode($errors);
        $url="Location:register.php?errors={$errors_str}";
        if($formdata){
            $old_data= json_encode($formdata);
            $url .="&old={$old_data}";
        }
        header($url);
    }
    else {        
            try {
                $fileobj = fopen('users.txt', 'a');
                $id = time();
                $image_new_name ='';
                if(isset($_FILES['image']) and ! empty($_FILES['image']['name'])){
                    $imagename= $_FILES["image"]['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $ext = pathinfo($imagename)['extension'];
                    $image_new_name = "images/{$id}.{$ext}";
                    if (in_array($ext,['png', 'jpg','jpeg'])){
                        try{
                            $uploaded = move_uploaded_file($tmp_name,"$image_new_name");
                        } catch (Exception $e){
                            var_dump($e->getMessage());
                            exit;
                        }
                    }
                }
                else
                {
                    $image_new_name = "images/default.avif";
                }


                $p->insert("student_data",$_POST["Name"],$_POST["email"],$_POST["password"],$image_new_name);


                echo"done";
                 header('Location:login.php');        
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }


