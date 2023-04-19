<?php 
session_start();
$_SESSION['current_page'] = 'post_form';

if(array_key_exists("auth",$_SESSION) == false){
    header("Location: login.php");
}

include_once('header.php');
?>

<div class="container">
  <form action="submit_event.php" method="post">
    <h1 style="color: #2c3e50; text-align:center">Post an Event</h1>
    <label for="event_name">Event Name:</label>
    <input type="text" name="event_name" required>
    
    <label for="event_date">Event Date:</label>
    <input type="date" name="event_date" required>
    
    <label for="event_location">Event Location:</label>
    <input type="text" name="event_location" required>
    
    <label for="event_description">Event Description:</label>
    <textarea name="event_description" required></textarea>
    
    <input type="submit" value="Submit Event">
  </form>
</div>