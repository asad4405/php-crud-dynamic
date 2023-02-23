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

    if($user['status'] == 1){
        $insert = "UPDATE users SET status = '2' WHERE id = $id";
        $result = mysqli_query($connect,$insert);

        $_SESSION['error'] = 'Deactive User Successfull!';

        header('location:users.php');
    }else{
        $insert = "UPDATE users SET status = '1' WHERE id = $id";
        $result = mysqli_query($connect,$insert);

        $_SESSION['success'] = 'Active User Successful!';
        
        header('location:users.php');
    }
}