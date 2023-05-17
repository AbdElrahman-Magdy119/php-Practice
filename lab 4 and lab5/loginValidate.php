<?php
include 'connect_to_db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

$p = new Database("localhost","root","1191997","student");
   
    $email = $_POST["email"];
    $password = $_POST["password"];

    $errors =[];
    $formdata = [];

    if(empty($email) and isset($email)){
        $errors['email']='email is required';
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email']='email must match example@example.com';
    }
    else{
        $formdata["email"]= $email;
    }


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

    if($errors){
        $errors_str = json_encode($errors);
        $url="Location:login.php?errors={$errors_str}";
        if($formdata){
            $old_data= json_encode($formdata);
            $url .="&old={$old_data}";
        }
        header($url);
    }
    else {
         $logged_in= false;
         $users=  $p->select("student_data");

        foreach ($users as $index=>$user){
            if($user['email']== $email and $user['password']== $password){
                $logged_in= true;
                break;
            }

        }
       

        if($logged_in){
            session_start();
            $_SESSION['user_email']=$email;
            $_SESSION['login']=true;
            header("Location:dataOfUser.php");  
        }else{
            header("Location:login.php?error=invalid email or password");
         }

        }
    