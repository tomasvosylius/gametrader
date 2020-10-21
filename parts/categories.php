<div class="categories-grid">

<?php 

    $db = getDb();
    $res = $db->query('SELECT id,Title FROM categories WHERE parentId IS NULL');

    while($row = $res->fetch_assoc()) {
        echo '<ul>';
        echo '<li class="parent"><span>'.$row['Title'].'</span></li>';
        $child_res = $db->query('SELECT id,Title FROM categories WHERE parentId = '.$row['id'].'');
        while($child_row = $child_res->fetch_assoc()) {
            echo '<li class="child"><a href="?page=category&id='.$child_row['id'].'">'.$child_row['Title'].'</a></li>';
        }   
        echo '</ul>';
    }

?>
</div>