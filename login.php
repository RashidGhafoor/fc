<?php 
session_start();
include_once('header.php');
?>

<div class="container">
    <h1>Login</h1>
    <form action="login_handler.php" method="post">
        <label for="username">Username / Email</label>
        <input type="text" id="username" name="username" placeholder="Enter username or email">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password">

        <input type="submit" value="Login">

        <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>

    </form>
    <div style="color: red;">
        <?php if(isset($_SESSION['message'])) {
            echo '<br>' . 'Error: ' . $_SESSION['message'];
            $_SESSION['message'] = null;
        } ?>
    </div>
</div>



<style>

    .container {
    margin: auto;
    width: 50%;
    text-align: center;
    }

    h1 {
    font-size: 36px;
    margin-bottom: 20px;
    }

    form {
    display: inline-block;
    text-align: left;
    }

    label {
    display: block;
    margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-radius: 5px;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
    }

    input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    font-size: 18px;
    cursor: pointer;
    }

</style>