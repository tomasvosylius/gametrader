<?php 

require('../lib/mysql.php');
require('../lib/session.php');
require('../lib/functions.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST["username"]) && isset($_POST["password"]) && 
        (!isset($_SESSION['isLogged']) || !$_SESSION['isLogged']))
    {
        $username = $_POST["username"];
        $pwd = $_POST["password"];
        $error = false;

        if( !(4 <= strlen($username) && strlen($username) <= 32) ||
            !(4 <= strlen($pwd) && strlen($pwd) <= 32)) {
            pushError('Wrong username or password.'); 
            $error = true;
        } 

        $db = getDb();
        $username = $db->real_escape_string($username);
        $res = $db->query("SELECT `id`,`Password` FROM `users` WHERE `Username`='$username'");

        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if(password_verify($pwd, $row['Password'])) {
                setUserLogged($row['id'], $username);
                pushSuccess('Successfully logged in!');
            } else {
                pushError('Wrong username or password.'); 
                $error = true;
            }
        } else {
            pushError('Wrong username or password.'); 
            $error = true;
        }

        if($error) {
            header('Location: ../index.php?page=login');
            return;
        }
    }
}
header('Location: ../index.php?page=home');

?>