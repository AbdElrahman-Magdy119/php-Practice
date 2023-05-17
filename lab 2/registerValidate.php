<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

   
    $f_name = $_POST["firstname"];
    $l_name = $_POST["lastname"];
    $email = $_POST["email"];

   

    $errors =[];
    $formdata = [];
   
    if(empty($f_name) and isset($f_name)){

        $errors['firstname']='firstname is required';
    }else{
        $formdata["firstname"]= $f_name;
    }

    if(empty($l_name) and isset($l_name)){

        $errors['lastname']='lastname is required';
    }else{
        $formdata["lastname"]= $l_name;
    }

    if($_POST["Gender"] == Null){
        $errors['Gender']='Gender is required';
    }else{
        $formdata["Gender"]= 'checked';
    }

    if(empty($email) and isset($email)){

        $errors['email']='email is required';
    }else{
        $formdata["email"]= $email;
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
    else
    {
       
        try {

            $fileobj = fopen('data.txt', 'a');
            $id = time();
            $user_data = "{$id}:{$_POST["firstname"]}:{$_POST["lastname"]}:{$_POST["Gender"]}:{$_POST["email"]}". PHP_EOL;
            fwrite($fileobj,$user_data);
            fclose($fileobj);
            header('Location:dataOfUser.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }