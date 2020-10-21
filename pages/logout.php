<?php 
    if(isset($_SESSION['isLogged']) && $_SESSION['isLogged']) {
        pushSuccess('Successfully logged out.');
        setUserLogged(0, '');
    }
    header('Location: index.php');
?>