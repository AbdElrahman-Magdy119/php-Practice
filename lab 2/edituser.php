<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';




$usersNewData=[];
 $user_id = $_GET["id"];
 $f_name = $_POST["firstname"];
 $l_name = $_POST["lastname"];
 $gender = $_POST["Gender"];
 $email = $_POST["email"];


  $user_new_data = "{$user_id }:{$f_name}:{$l_name}:{$gender}:{$email}";
 

 $users=  file('data.txt');


foreach ($users as $index=>$user){
    $users_data = explode(':', $user);
    if($users_data[0]==$user_id){
        $users[$index] = $user_new_data;  
        break;
    }

}

var_dump($users);

$fileobj = fopen("data.txt", 'w');
foreach ($users as $user){
    fwrite($fileobj, $user);
}
fclose($fileobj);

header("Location:dataOfUser.php");