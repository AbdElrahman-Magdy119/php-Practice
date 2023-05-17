<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';


session_start();

if($_SESSION['login']){
    echo    "<div class='d-flex justify-content-center h1 text-black mt-5'><b>Welcome to your home page {$_SESSION['user_email']}</b></div>";
}else{
    header("Location:login.php");
}

echo    "<div class='d-flex justify-content-center' style='margin-left: 30rem;  width: 12rem;height: 3rem; margin-top: 15rem;'>
<a href='logout.php' class='btn btn-danger w-100 h-100'> Logout </a></div>";