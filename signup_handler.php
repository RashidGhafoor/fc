<?php
session_start();
require_once "Dao.php";

$dao = new Dao();
$pdo = $dao -> getConnection();

// Validate
if(empty(trim($_POST["username"]))){
    showError("Please enter a username.");
} elseif(empty(trim($_POST["email"]))){
    showError("Please enter an email.");
} elseif(empty(trim($_POST["password"]))){
    showError("Please enter a password.");
} elseif(strlen(trim($_POST["password"])) < 6){
    showError("Password must have atleast 6 characters.");
}else{

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT id FROM users WHERE username = :username OR email = :email";
    
    $stmt = $pdo->prepare($sql);
        
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    
    $stmt->execute();

    if($stmt->rowCount() > 0){
        showError("This username or email is already taken.");
    } else{
        // add new user

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);

        $stmt->execute();

        unset($stmt);
        unset($pdo);

        header("location: login.php");

        unset($stmt);
        unset($pdo);
    }
}

function showError($err_message){
    $_SESSION['message'] = $err_message;
    header('Location: signup.php');
}