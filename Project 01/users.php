<?php

session_start();

if(!isset($_SESSION['user'])){
    header('location:signin.php');
}

require_once "db.php";

$query = "SELECT * FROM users";
$result = mysqli_query($connect,$query);

if(mysqli_num_rows($result) > 0){
    $users = mysqli_fetch_all($result,true);
}


include "view/users.view.php";