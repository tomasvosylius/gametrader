<?php if(isset($_SESSION['msg_error'])):
    ?> 
    <ul class="error">
    <?php 
        foreach($_SESSION['msg_error'] as $err) {
            echo '<li>'.$err.'</li>';
        }
    ?>
    </ul>
    <?php
    endif;
    unset($_SESSION['msg_error']);
?>

<?php if(isset($_SESSION['msg_success'])):
    ?> 
    <ul class="success">
    <?php 
        foreach($_SESSION['msg_success'] as $succ) {
            echo '<li>'.$succ.'</li>';
        }
    ?>
    </ul>
    <?php
    endif;
    unset($_SESSION['msg_success']);
?>