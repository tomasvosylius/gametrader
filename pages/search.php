<?php 
    require('./parts/categories.php');
?>

<h4 class="title-separator">Search results</h4>

<?php 
    if(isset($_GET['text'])) {
        $text = $_GET['text'];
        require_once('./lib/mysql.php');
        require_once('./lib/functions.php');
        $db = getDb();
        $text = $db->real_escape_string($text);
        $res = $db->query("SELECT * FROM `items` WHERE Title LIKE '%%$text%%'");
        displayItems($res);
        $res->free_result();
        return;
    } 
    header('Location: ./index.php?page=home');
?>