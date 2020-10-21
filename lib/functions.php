<?php 
function pushError($msg) { 
    pushSessionElement('msg_error', $msg);
}

function pushSuccess($msg) { 
    pushSessionElement('msg_success', $msg);
}

function pushSessionElement($key, $value) {
    if(!isset($_SESSION[$key])) {
        $_SESSION[$key] = array($value);
    }
    else {
        array_push($_SESSION[$key], $value);
    }
}

function IsUsernameRegistered($username) { 
    $db = getDb();
    $username = $db->real_escape_string($username);
    $res = $db->query("SELECT NULL FROM `users` WHERE Username = '$username'");
    return ($res->num_rows > 0);
}

function IsEmailRegistered($email) { 
    $db = getDb();
    $email = $db->real_escape_string($email);
    $res = $db->query("SELECT NULL FROM `users` WHERE Email = '$email'");
    return ($res->num_rows > 0);
}

function setUserLogged($userid, $username) {
    $_SESSION['isLogged'] = ($userid > 0);
    $_SESSION['userId'] = $userid;
    $_SESSION['username'] = $username;
}

function displayItems($res, $urlPage = 'item') {
    $str = '';
    $str .= '<div class="items-grid">';
    while($row = $res->fetch_assoc()) {
        $catTitles = getCategoryAndParentTitle($row['CategoryId']);

        $url = '?page='.$urlPage.'&id='.$row['id'].'';
        $str .= '<div class="item">
            <a href='.$url.'>
                <img class="item-img-top" 
                    src="data:image/jpg;base64,'.$row['Image'].'"
                    alt="Item image" />
            </a>
            <div class="item-body">
                <h5 class="item-title">
                    <a href="'.$url.'">'.$row['Title'].'</a>
                </h5>
                <p class="item-text">
                    '.$row['Description'].'
                </p>
                <p class="item-footer">
                    <small>In '.$catTitles['ParentTitle'].' / '.$catTitles['ChildTitle'].' </small>
                </p>
            </div>
        </div>
        ';
    }
    $str .= '</div>';
    echo $str;

    return $res->num_rows;
}

function getCategoryAndParentTitle($id) {
    $db = getDb();
    $res = $db->query("SELECT c1.Title AS ParentTitle, c2.Title AS ChildTitle FROM `categories` c1, `categories` c2 WHERE c1.ParentId IS NULL AND c2.id = $id AND c2.ParentId = c1.id");
    $row = $res->fetch_assoc();
    return $row;
}


?>