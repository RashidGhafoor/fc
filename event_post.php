<?php 
session_start();

if($_SESSION['auth'] == false){
	header("Location: login.php");
}

include_once('header.php');
require_once "Dao.php";

$dao = new Dao();
$result = $dao -> getPost($_GET['post_id']);

?>


<div id="post-container">
  <div class="post">
    <!-- <div class="post-header">
      <img src="./images/profile-icon.jpg" alt="Profile Picture">
      <h3>Username</h3>
    </div> -->
    <div class="post-description">
      <h2><?php echo htmlspecialchars($result['event_name']) ?></h2>
      <p><?php echo htmlspecialchars($result['event_description']) ?></p>
    </div>
    <div class="post-footer">
      <div class="comment-form">
        <form action="<?php echo 'comment_handler.php?post_id=' . $_GET['post_id'] ?>" method="post">
          <input type="text" name="comment" placeholder="Add a comment...">
          <button type="submit">Post</button>
        </form>
      </div>

      <div style="color: red; margin-bottom: 20px;">
        <?php if(isset($_SESSION['message'])) {
            echo '<br>' . 'Error: ' . $_SESSION['message'];
            $_SESSION['message'] = null;
        } ?>
      </div>

      <ul class="comment-list">
        <!-- <li>
          <div class="comment">
            <img src="./images/profile-icon.jpg" alt="Profile Picture">
            <p>Username</p>
          </div>
        </li> -->
        <?php 
          $result = $dao -> getPostComments($_GET['post_id']);
          foreach($result as $comment){
            echo '
              <li>
              <div class="comment">
                <img src="./images/chat-icon.png" alt="Profile Picture">
                <p>' . htmlspecialchars($comment['comment']) . '</p>
              </div>
              </li>';
          }
        
        ?>

      </ul>
    </div>
  </div>
</div>