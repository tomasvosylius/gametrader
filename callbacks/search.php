<?php 
    if(isset($_GET['text'])) {
        $text = $_GET['text'];
        header('Location: ../index.php?page=search&text='.$text);
        return;
    }
    header('Location: ../index.php?page=home');
?>