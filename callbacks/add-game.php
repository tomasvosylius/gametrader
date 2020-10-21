<?php 
    require_once('../lib/mysql.php');
    require_once('../lib/session.php');
    require_once('../lib/functions.php');

    if( isset($_POST['title']) && 
        isset($_POST['preffered']) && 
        isset($_POST['description']) && 
        isset($_POST['number']) && 
        isset($_POST['category'])) {

        $error = false;
        if(!isset($_FILES) || (!strcmp($_FILES['image']['type'], 'image/jpeg') && !strcmp($_FILES['image']['type'], 'image/jpg')) ||
            filesize($_FILES['image']['tmp_name']) > 100000 ||
            $_FILES['image']['size'] > 100000) {
            pushError('Image must be JPEG and under 1mb!');
            $error = true;
        }
        
        if(!isset($_SESSION['isLogged']) || !$_SESSION['isLogged'] || $_SESSION['userId'] <= 0) {
            pushError('Login first!');
            $error = true;
        }

        $desc = $_POST['description'];
        $interestedIn = $_POST['preffered'];
        $phoneNumber = $_POST['number'];
        $categoryId = $_POST['category'];
        $title = $_POST['title'];
        $img_data = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

        /* if(!correctNumber($number)) {
            pushError('Wrong number format!');
            $error = true;
        } */
        /* if(!correctCategoryId($categoryId)) {
            pushError('Wrong category selected!');
            $error = true;
        } */

        if(!$error) {
            $db = getDb();

            // Sanitize values
            $title = $db->real_escape_string($title);
            $phoneNumber = $db->real_escape_string($phoneNumber);
            $interestedIn = $db->real_escape_string($interestedIn);
            $desc = $db->real_escape_string($desc);
            $userId = $_SESSION['userId'];

            // Insert to db & redirect to item view
            $db->query("INSERT INTO `items` (`Title`,`Description`,`Image`,`UserId`,`CategoryId`,`InterestedIn`,`PhoneNumber`,`Date`) VALUES 
                ('$title','$desc','$img_data','$userId','$categoryId','$interestedIn','$phoneNumber',NOW());") or die($db->error);
            $insertId = $db->insert_id;

            pushSuccess('Game added!');
            return header("Location: ../index.php?page=item&id=".$insertId);
        }
    
    } else {
        pushError('Make sure to fill in all inputs!');
    }

    header("Location: ../index.php?page=add-game");
?>