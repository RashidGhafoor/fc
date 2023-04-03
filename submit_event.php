<?php
require_once "Dao.php";

$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$event_location = $_POST['event_location'];
$event_description = $_POST['event_description'];

$dao = new Dao();
$result = $dao -> savePost ($event_name, $event_date, $event_location, $event_description);

if($result){
    header('Location: events.php');
    exit;
} else {
    echo "Error posting form data";
    exit;
}