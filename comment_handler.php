<?php
session_start();
require_once "Dao.php";

$comment = $_POST['comment'];
$post_id = $_GET['post_id'];

if (strlen($comment) > 200) {
    $_SESSION['message'] = "Comment too long!";
    header('Location: event_post.php?post_id=' . $_GET['post_id']);
    exit();
  }

if (empty($comment)) {
    $_SESSION['message'] = "Please enter a comment";
    header('Location: event_post.php?post_id=' . $_GET['post_id']);
    exit();
}

$dao = new Dao();
$result = $dao-> saveComment($_GET['post_id'], $comment);

if($result){
    header('Location: event_post.php?post_id=' . $post_id);
    exit;
} else {
    echo "Error posting form data";
    exit;
}