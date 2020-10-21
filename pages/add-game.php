<h2>Add game</h2>

<?php 
    if(!isset($_SESSION["isLogged"]) || !$_SESSION["isLogged"]) {
        pushError('Please login first!');
        return header("Location: index.php?page=login");
    }

    $db = getDb();
?>

<form action="callbacks/add-game.php" method="post" enctype="multipart/form-data">
<div class="input-group">
    <div class="input-item">
        <label for="image"><img src="./assets/icons/image.svg"/><small>Image</small></label>
        <input type="file" id="image" name="image" accept="image/jpeg"/>
    </div>
    <div class="input-item">
        <label for="title"><img src="./assets/icons/type.svg"/> <small>Title</small></label>
        <input type="text" id="title" name="title" placeholder="Game title"/>
    </div>
    <div class="input-item">
        <label for="preffered"><img src="./assets/icons/controller.svg"/> <small>Interested in</small></label>
        <input type="text" id="preffered" name="preffered" placeholder="Preferable game to trade in" value="Any game"/>
    </div>
    <div class="input-item">
        <label for="image"><img src="./assets/icons/collection.svg"/> <small>Category</small></label>
        <select name="category" id="category">
            <?php 
                $res = $db->query("SELECT Title,id FROM `categories` WHERE ParentId IS NULL");
                while($row = $res->fetch_assoc()) {
                    echo '<option value="'.$row['id'].'" disabled>— '.$row['Title'].'</option>';

                    $child_res = $db->query("SELECT Title,id FROM `categories` WHERE ParentId = ".$row['id']);
                    while($child = $child_res->fetch_assoc()) {
                        echo '<option value="'.$child['id'].'">'.$child['Title'].'</option>';
                    }
                }
            ?>
        </select>
    </div>
    <div class="input-item">
        <label for="number"><img src="./assets/icons/phone.svg"/> <small>Phone number</small></label>
        <input type="text" id="number" name="number" placeholder="Contact number"/>
    </div>
    <div class="input-item">
        <label for="image"><img src="./assets/icons/chat-square-quote.svg"/> <small>Description</small></label>
        <textarea id="description" name="description" rows="4" cols="50"></textarea>
    </div>

    <div class="input-item">
        <button type="submit">Add game</button>
    </div>
</div>
</form>