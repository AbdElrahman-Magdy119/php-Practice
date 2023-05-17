<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1 class='d-flex justify-content-center pt-3 mb-5'>  <b>All users</b>  </h1>";





try{

    $users_data=  file("data.txt");
    echo "<table class='table'> <tr> <th> id</th>
        <th> FirstName </th>  <th> LastName </th>
        <th> Gender </th>  <th> Email </th>
        <th> Edit </th> <th> Delete</th>
        </tr>";
    foreach ($users_data as $user){
        echo '<tr>';
           $user_data = explode(':', $user);
           foreach ($user_data as $data){
               echo "<td> {$data}</td>";
           }

        echo" <td> <a class='btn btn-warning' href='newFormUpdate.php?
    id={$user_data[0]} & f_name={$user_data[1]} & l_name={$user_data[2]} & gender={$user_data[3]} & email={$user_data[4]}'> Edit</a></td>
            <td> <a class='btn btn-danger' href='deleteuser.php?id={$user_data[0]}'> Delete</a></td>
 
        </tr>";
    }
    echo "</table>";

}catch (Exception $e){
    echo $e->getMessage();
}


?>

<a href="register.php" class="btn btn-primary">Add new user </a>
