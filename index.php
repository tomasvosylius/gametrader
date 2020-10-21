<!DOCTYPE html>
<?php
    require_once('lib/session.php');
    require_once('lib/mysql.php');
    require_once('lib/functions.php');
    require_once('parts/head.php');
    require_once('parts/header.php');
    require_once('parts/searchbar.php');
    require_once('parts/messages.php');

    if(!isset($_GET['page']) || !file_exists('pages/'.$_GET['page'].'.php')) {
        $_GET['page'] = 'home';
    } 
    include_once('pages/'.$_GET['page'].'.php');

    require_once('parts/footer.php');
?>


		