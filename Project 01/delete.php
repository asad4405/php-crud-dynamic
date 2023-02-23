<?php

session_start();

if(!isset($_SESSION['user'])){
    header('location:signin.php');
}

require_once "db.php";

$id = $_GET['id'];

// select query //

if((int)$id){
    $query = "SELECT id,name,email,photo,status FROM users WHERE id = $id";
    $result = mysqli_query($connect,$query);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
    }

    // delete query //

    $path = 'uploads/'.$user['photo'];
    if(file_exists($path)){
        unlink($path);
    }

    $delete = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($connect,$delete);

    $_SESSION['error'] = 'Delete Successfull!';

    header('location:users.php');
}