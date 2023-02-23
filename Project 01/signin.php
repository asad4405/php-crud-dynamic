<?php
session_start();

require_once "db.php";

$errors = [];
if(isset($_POST['submit'])){
    $email = trim(htmlentities($_POST['email']));
    $password = htmlentities($_POST['password']);
    $password_hash = password_hash($password,PASSWORD_DEFAULT);

    // email //

    if(empty($email)){
        $errors['emailError'] = 'Enter your Email!';
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['emailError'] = 'Enter your Valid Email Address!';
    }

    // password //

    if(empty($password)){
        $errors['passError'] = 'Enter your Password!';
    }

    //  insert signin page //

    $query = "SELECT * FROM users WHERE email ='$email'";
    $result = mysqli_query($connect,$query);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password,$user['password'])){
            unset($user['password']);

            $_SESSION['user'] = $user;
            $_SESSION['success'] = 'Login Successfull!';

            header('location:users.php');
        }else{
            $_SESSION['error'] = 'Password Wrong!';
        }
    }else{
        $_SESSION['error'] = 'User Not Found!';
    }
}

include "view/signin.view.php";
unset($_SESSION['error']);