<h3 class="title-separator">Newest games</h3>

<?php 
    $db = getDb();
    $res = $db->query('SELECT * FROM items ORDER BY `Date` ASC LIMIT 40');
    displayItems($res);
    $res->free_result();
?>