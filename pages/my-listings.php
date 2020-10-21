<h3 class="title-separator">Your listings</h3>
<?php
    if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] && $_SESSION['userId'] > 0) {
        $userId = $_SESSION['userId'];
        $db = getDb();
        $res = $db->query("SELECT * FROM `items` WHERE `UserId`='$userId'");
        if(displayItems($res) <= 0) {
            echo '<p>You have no items, but you can add one!</p>';
        }
        $res->free_result();

        return;
    }
    header("Location: index.php?page=home");
?>