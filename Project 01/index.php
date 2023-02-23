<?php

session_start();

if(!isset($_SESSION['user'])){
}

include "view/index.view.php";