<?php

define('HOST_NAME','localhost');
define('USER_NAME','root');
define('PASSWORD','');
define('DB_NAME','register_form');

try{
    $connect = mysqli_connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);
}catch(Exception $e){
    echo "Database Connection Error!".$e->getMessage();
}

?>