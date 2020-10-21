<?php 

require('../lib/mysql.php');
require('../lib/session.php');
require('../lib/functions.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && 
        (!isset($_SESSION['isLogged']) || !$_SESSION['isLogged']))
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pwd = $_POST["password"];
        $error = false;
        if(!(4 <= strlen($username) && strlen($username) <= 32)) {
            pushError('Username must be 6-32 characters long.'); 
            $error = true;
        } 
        if(!(4 <= strlen($pwd) && strlen($pwd) <= 32)) {
            pushError('Password must be 6-32 characters long.'); 
            $error = true;
        } 
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            pushError('Invalid email address.');
            $error = true;
        }
        if(IsUsernameRegistered($username)) {
            pushError('Username already in use.');
            $error = true;
        } 
        if(IsEmailRegistered($email)) {
            pushError('Email already in use.');
            $error = true;
        }

        if($error) {
            header('Location: ../index.php?page=register');
            return;
        } else {
            $db = getDb();
            $hashed = password_hash($pwd, PASSWORD_BCRYPT);
            $username = $db->real_escape_string($username);
            $email = $db->real_escape_string($email);

            $db->query("INSERT INTO `users` (`Username`,`Password`,`Email`) VALUES ('$username','$hashed','$email')");
            $userId = $db->insert_id;

            setUserLogged($userId, $username);
            pushSuccess('Successfully registered!');
        }
    }
}
header('Location: ../index.php?page=home');

?>