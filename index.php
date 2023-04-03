<?php

// session_start();

if($_SESSION['auth'] == true){
    header("Location: events.php");
}else {
    header("Location: login.php");
}