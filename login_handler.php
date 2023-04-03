<?php
require_once "Dao.php";

$dao = new Dao();
$pdo = $dao -> getConnection();

$username = $_POST['username'];
$password = $_POST['password'];


if(empty(trim($_POST["username"]))){
  showError("Please enter username.");
} elseif(empty(trim($_POST["password"]))){
  showError("Please enter your password.");
} else {
  $sql = "SELECT * FROM users WHERE username = :username";

  $stmt = $pdo -> prepare($sql);

  $stmt->bindParam(":username", $username);
  $stmt-> execute();

  $row = $stmt-> fetch();

  if ($password == $row['password']) {
    session_start();
    $_SESSION['auth'] = true;
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['username'];
    header("Location: events.php");
    exit();
  } else {
    $_SESSION['message'] = 'Invalid Username or password';
    header("Location: login.php");
    exit();
  }
}



function showError($err_message){
  $_SESSION['message'] = $err_message;
  header('Location: login.php');
}