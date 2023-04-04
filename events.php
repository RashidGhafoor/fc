<?php 
session_start();

// if (array_key_exists("auth",$_SESSION)){
//     if($_SESSION["auth"] == false){
//     header("Location: login.php");
//     }
// }

if($_SESSION['auth'] == false){
	header("Location: login.php");
}

include_once('header.php');
?>


<main>
	<div class="header-container">
		<h1>Posted Events</h1>
	</div>
	<div class="event-container">
		<?php
	
			require_once('Dao.php');

			$dao = new Dao();
			$results = $dao -> getPosts();

			foreach($results as $event){
				echo '
				<div class="event">
					<h2> ' . $event["event_name"] . ' </h2>
					<p><strong>Date:</strong> ' . htmlspecialchars($event["event_date"]) . '</p>
					<p><strong>Location:</strong>' . htmlspecialchars($event["event_location"]) . '</p>
					<p><strong>Description:</strong> '. htmlspecialchars($event['event_description']) . '</p>
					<a href="event_post.php?post_id= ' . $event["id"] .' "><button class="discuss-btn">Discuss</button></a>
				</div>';
			}

		?>

	</div>
</main>