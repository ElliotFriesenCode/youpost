<?php
require_once 'init.php';

if(isset($_GET['id'])){
 $itemQuery = $db->prepare("
 DELETE FROM items
 WHERE id = :item ");
 $itemQuery->execute([
     'item' => $_GET['id']
 ]);


}
header("Location: index.php");