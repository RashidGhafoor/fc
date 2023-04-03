<?php 
session_start();

if($_SESSION['auth'] == false){
	header("Location: login.php");
}

include_once('header.php');
?>

<form action="submit_event.php" method="post">
  <h1>Post an Event</h1>
  <label for="event_name">Event Name:</label>
  <input type="text" id="event_name" name="event_name" required>
  
  <label for="event_date">Event Date:</label>
  <input type="date" id="event_date" name="event_date" required>
  
  <label for="event_location">Event Location:</label>
  <input type="text" id="event_location" name="event_location" required>
  
  <label for="event_description">Event Description:</label>
  <textarea id="event_description" name="event_description" required></textarea>
  
  <input type="submit" value="Submit Event">
</form>



<style>
    form {
    max-width: 600px;
    margin: 0 auto;
    }
    h1 {
    font-size: 36px;
    margin-bottom: 20px;
    }

    label {
    display: block;
    margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    }

    input[type="date"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    }

    input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    }

    input[type="submit"]:hover {
    background-color: #0062cc;
    }

</style>