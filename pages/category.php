<?php 
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        ?>
        <h4 class="title-separator"><?php 
            $titles = getCategoryAndParentTitle($id);
            echo $titles['ParentTitle'].' / '.$titles['ChildTitle'];
        ?>
        </h4>
        <?php
        if($id > 0) {
            
            $db = getDb();
            $res = $db->query("SELECT * FROM items WHERE CategoryId = $id ORDER BY `Date` ASC");
            if(displayItems($res) <= 0) {
                echo '<p>No items found in this category. Be the first to add one!</p>';
            }
            $res->free_result();
            return;   
        }
    }
    header('Location: ./index.php?page=home');

?>