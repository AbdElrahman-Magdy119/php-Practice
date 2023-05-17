<?php
include 'connect_to_db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';


$p = new Database("localhost","root","1191997","student");

$usersNewData=[];
 $user_id = $_GET["id"];
 $Name = $_POST["Name"];
 $email = $_POST["email"];
 $password = $_POST["password"];

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






//   $user_new_data = "{$user_id }:{$Name}:{$email}:{$password}:{$image_new_name}";
 

 $users= $p->select("student_data");


foreach ($users as $index=>$user){
    if($user['id'] == $user_id){
        $p->update("student_data",$user_id,$Name,$email,$password,$image_new_name);        
        break;
    }
       
}


header("Location:dataOfUser.php");