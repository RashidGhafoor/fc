<?php 
session_start();
$_SESSION['current_page'] = 'login';
include_once('header.php');
?>

<div class="container">
    <h1>Login</h1>
    <form name="form"  action="login_handler.php" onsubmit="return validateForm()" method="post">
        <label for="username">Username / Email</label>
        <input type="text" name="username" placeholder="Enter username or email" 
        value="<?php echo isset($_SESSION['inputs']['username']) ? $_SESSION['inputs']['username'] : '' ?>">
        <small id="usermsg" style="color:red; visibility: hidden; display:block;">Username or email is missing.</small>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter password">
        <small id="passmsg" style="color:red; visibility: hidden; display:block; margin-bottom: 5px">Password is missing.</small>

        <input type="submit" value="Login">

        <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>

    </form>
</div>
<?php
unset($_SESSION['inputs']);
include_once('error.php');
?>