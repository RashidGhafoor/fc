<?php 
    if(isset($_SESSION['message'])) {
        echo '<div class="error-message">' . 'Error: ' . $_SESSION['message'] . '</div>';

        unset($_SESSION['message']);
    } 
?>

<script>
    $(document).ready(function() {
        $(".error-message").fadeIn(500);
        setTimeout(function() {
            $(".error-message").fadeOut(500);
        }, 3000);
    });
</script>

<style>
    .error-message {
        position: fixed;
        top: 20%;
        right: 1%;
        transform: translateY(-50%);
        padding: 20px;
        background-color: #f44336; /* Red */
        color: white;
        border-radius: 10px;
    }
</style>