<?php
session_start();
require_once "Dao.php";

$dao = new Dao();
$pdo = $dao -> getConnection();

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['inputs'] = $_POST;

if(empty(trim($_POST["username"]))){
  showError("Please enter username or email.");
} elseif(empty(trim($_POST["password"]))){
  showError("Please enter your password.");
} else {
  $sql = "SELECT * FROM users WHERE username = :username OR email = :username";

  $stmt = $pdo -> prepare($sql);

  $stmt->bindParam(":username", $username);
  $stmt-> execute();

  $row = $stmt-> fetch();
  
  if($row){
          if (password_verify($password . "I'm salty", $row['password'])) {
              $_SESSION['auth'] = true;
              $_SESSION['user_id'] = $row['id'];
              $_SESSION['user_name'] = $row['username'];
              $_SESSION['current_page'] == 'home';
              header("Location: events.php");
              exit();
            }
    } 
  $_SESSION['message'] = 'Invalid Username or password';
  header("Location: login.php");
  exit();
}



function showError($err_message){
  $_SESSION['message'] = $err_message;
  header('Location: login.php');
}