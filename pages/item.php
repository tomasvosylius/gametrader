<?php
    $id = $_GET['id'];
    $db = getDb();
    $res = $db->query("SELECT i.*, u.Email AS UserEmail FROM `items` i, `users` u WHERE i.id = $id AND u.id = i.UserId");
    $row = $res->fetch_assoc();

    $out = '';
    $out .= '<h5 class="title-separator">'.$row["Title"].'</h5>';
    $out .= '<div class="single-item">';
    $out .= '
    <div class="single-item-img">
        <img src="data:image/jpg;base64,'.$row['Image'].'"/>
    </div>';
    $out .= '
    <div class="single-item-body">
        <h4 class="title-separator">Details</h4>
        <ul class="single-item-details">
            <li><b>Interested in trading for:</b> '.$row['InterestedIn'].'</li>
            <li><b>Uploaded:</b> '.$row['Date'].'</li>
            <li><b>Description:</b> <p>'.$row['Description'].'</p></li>
        <ul>
        <h4 class="title-separator">Contact</h4>
        <ul class="single-item-details">
            <li><b>Email:</b> '.$row['UserEmail'].'</li>
            <li><b>Phone number:</b> '.$row['PhoneNumber'].'</li>
        <ul>';
        
    if( isset($_SESSION['isLogged']) && $_SESSION['isLogged'] && 
        isset($_SESSION['userId']) && $_SESSION['userId'] == $row['UserId'] && $row['UserId'] > 0) {
            $out .= '<a class="delete-item" href="index.php?page=delete-item&id='.$row['id'].'">Delete listing</a>';
    }

    $out .= '</div>';


    $out .= '</div>';
    echo $out;
?>
  