<?php 
require_once 'init.php';
if(isset($_GET['as'], $_GET['item'])){


$item = $_GET['item'];
$as = $_GET['as'];

switch($as){
    case 'done':
            $doneQuery = $db->prepare("
            UPDATE items
            SET done = 1
            WHERE id = :item
            AND user = :user");

             $doneQuery->execute([
                 'item' => $item,
                 'user' => $_SESSION['user_id']
             ]);
       

        break;
        case 'delete':
              $deleteQuery = $db->prepare("
              DELETE FROM items
              WHERE id = :item
              AND user = :user");
              
              $deleteQuery->execute([
                  'item' => $item,
                  'user' => $_SESSION['user_id']
              ]);

             }  
}
header("Location: index.php");
?>