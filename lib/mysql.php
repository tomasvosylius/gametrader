<?php 

function getDb()
{
    static $db;
    if(!$db) $db = new mysqli('localhost', 'root', '', 'gametrader');
    return $db;
}

?>