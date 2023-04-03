<?php

session_start();

if (array_key_exists("auth",$_SESSION)){
    if($_SESSION["auth"] == true){
    header("Location: events.php");
    }
} else {
    header("Location: login.php");
}