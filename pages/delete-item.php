<?php
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        if(isset($_SESSION['userId']) && isset($_SESSION['isLogged']) && $_SESSION['isLogged']) {
            $userId = $_SESSION['userId'];
            $db = getDb();
            $res = $db->query("DELETE FROM `items` WHERE UserId = '$userId' AND id = '$id'");   
            // @TODO: only if affected_rows > 0: 
            pushSuccess('Listing successfully deleted!');
        }
    }
    header("Location: index.php?page=my-listings");

?>