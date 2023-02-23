<?php

session_start();

if(!isset($_SESSION['user'])){
    header('location:signin.php');
}

require_once "db.php";

$id = $_GET['id'];

if((int)$id){
    $query = "SELECT id,name,email,photo,status FROM users WHERE id = $id";
    $result = mysqli_query($connect,$query);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
    }

    $errors = [];
    if(isset($_POST['submit'])){
        $name = trim(htmlentities($_POST['name']));
        $email = trim(htmlentities($_POST['email']));
        $photo = $_FILES['photo'];

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

        // photo //

        $phto_type = ['jpg','png','jpeg'];

        $photoExplode = explode('.',$photo['name']);
        $photoExtention = end($photoExplode);

        if($photo['name']){
            if(empty($photo['name'])){
                $errors['photoError'] = 'Please select your Photo!';
            }elseif(!in_array($photoExtention,$phto_type)){
                $errors['photoError'] = 'Please select jpg , png or jpeg Photo!';
            }elseif($photo['size'] > 1000000){
                $errors['photoError'] = 'Select Max size 1 Mb Photo!!';
            }else{
                $path = 'uploads/'.$user['photo'];
                if(file_exists($path)){
                    unlink($path);
                }

                $photoName = 'Profile_'.uniqid().'.'.$photoExtention;
                move_uploaded_file($photo['tmp_name'],'uploads/'.$photoName);
            }
        }else{
            $photoName = $user['photo'];
        }

        // insert edit page //

        if(empty($errors)){
            $insert = "UPDATE users SET name='$name',email='$email',photo = '$photoName' WHERE id = $id";

            $result = mysqli_query($connect,$insert);

            if($result){
                $message_type = 'success';
                $message = "Update Successfull!";

                $_SESSION['success'] = 'Update Successfull!';

                header("location:users.php");
            }else{
                $message_type = 'error';
                $message = "Update Failed!";
            }
        }
    }
}


include "view/edit.view.php";