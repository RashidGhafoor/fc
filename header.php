<!DOCTYPE html>
<html>
<head>
	<title>Festive Conversations</title>
	<link rel="stylesheet" type="text/css" href="./style/style.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Noto+Serif&display=swap" rel="stylesheet">
</head>
<body>
    <header>
		<nav>
			<div class="logo-container">
				<a href="events.php"><img src="./images/logo.png" alt="Logo"></a>
			</div>
			<ul>
				<li><a class="<?php if($_SESSION['current_page'] == 'home') { echo 'active'; } ?>" href="events.php">Home</a></li>
				<li><a class="<?php if($_SESSION['current_page'] == 'post_form') { echo 'active'; } ?>" href="event_form.php">Post Event</a></li>   
                <!-- <li><a href="">My Posts</a></li> -->

                <?php
                   if (array_key_exists("auth",$_SESSION)){
                    if($_SESSION["auth"] == true){
                        echo '| <li><a href="logout.php">Logout</a></li>';
                    }
                   } else {
                    echo '<li><a class="'.($_SESSION["current_page"] == "login" ? "active" : "").'" href="login.php">Login</a></li> | <li><a class="'.($_SESSION["current_page"] == "signup" ? "active" : "").'" href="signup.php">Sign up</a></li> ';
                   }
                   
                ?>

			</ul>
		</nav>
</header>

<style>
    .active {
        border-top: 2px solid red;
    }
</style>