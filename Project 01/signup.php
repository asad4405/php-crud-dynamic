<?php


require_once "db.php";

$errors = [];
if(isset($_POST['submit'])){
    $name = trim(htmlentities($_POST['name']));
    $email = trim(htmlentities($_POST['email']));
    $password = htmlentities($_POST['password']);
    $photo = $_FILES['photo'];
    $password_hash = password_hash($password,PASSWORD_DEFAULT);

    // name //

    if(empty($name)){
        $errors['nameError'] = 'Enter your Name!';
    }elseif(strlen($name) < 4 || strlen($name) > 32){
        $errors['nameError'] = 'Min 4 - 32 Max Cherecter your Name!';
    }

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

    // photo //

    $phto_type = ['jpg','png','jpeg'];

    $photoExplode = explode('.',$photo['name']);
    $photoExtention = end($photoExplode);

    if(empty($photo['name'])){
        $errors['photoError'] = 'Please select your Photo!';
    }elseif(!in_array($photoExtention,$phto_type)){
        $errors['photoError'] = 'Please select jpg , png or jpeg Photo!';
    }elseif($photo['size'] > 1000000){
        $errors['photoError'] = 'Select Max size 1 Mb Photo!!';
    }else{
        $photoName = 'Profile_'.uniqid().'.'.$photoExtention;
        move_uploaded_file($photo['tmp_name'],'uploads/'.$photoName);
    }

    // insert signup page //

    if(empty($errors)){
        $insert = "INSERT INTO users(name,email,password,photo)VALUES('$name','$email','$password_hash','$photoName')";

        $result = mysqli_query($connect,$insert);

        if($result){
            $message_type = 'success';
            $message = "Account Create Successfull!";
        }else{
            $message_type = 'error';
            $message = "Account Create Failed!";
        }
    }
}

include "view/signup.view.php";