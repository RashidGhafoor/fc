<?php 
session_start();
$_SESSION['current_page'] = 'signup';
include_once('header.php');
?>

<div class="container">
    <h1>Signup</h1>
    <form name="form" action="signup_handler.php" onsubmit="return validateForm()" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username"
        value="<?php echo isset($_SESSION['inputs']['username']) ? $_SESSION['inputs']['username'] : '' ?>">
        <small id="usermsg" style="color:red; visibility: hidden;">Username is missing.</small>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter email"
        value="<?php echo isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : '' ?>">
        <small id="emailmsg" style="color:red; visibility: hidden;">Email is missing.</small>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter password">
        <small id="passmsg" style="color:red; visibility: hidden; display:block; margin-bottom: 5px">Password is missing.</small>

        <input type="submit" value="Signup">

        <p><a href="login.php">Login instead?</a>.</p>
    </form>
</div>

<?php 
unset($_SESSION['inputs']);
include_once('error.php');
?>


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
    input[type="email"],
    input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 0px;
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