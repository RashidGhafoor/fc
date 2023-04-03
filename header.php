
<!DOCTYPE html>
<html>
<head>
	<title>Festive Conversations</title>
	<link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
<body>
    <header>
		<nav>
			<div class="logo-container">
				<a href="events.php"><img src="./images/logo.png" alt="Logo"></a>
			</div>
			<ul>
				<li><a href="events.php">Home</a></li>
				<li><a href="event_form.php">Post Event</a></li>   
                <!-- <li><a href="">My Posts</a></li> -->

                <?php
                   if (array_key_exists("auth",$_SESSION)){
                    if($_SESSION["auth"] == true){
                        echo '| <li><a href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li><a href="login.php">Login</a></li> | <li><a href="signup.php">Sign up</a></li> ';
                    }
                   } else {
                    echo '<li><a href="login.php">Login</a></li> | <li><a href="signup.php">Sign up</a></li> ';
                   }
                ?>

			</ul>
		</nav>
</header>