
<?php
require_once 'init.php';

$id = $_SESSION['user_id'];

$viewQuery = $db->prepare("
UPDATE users
SET current_id = :current_id
WHERE id = :id
");

if(isset($_GET['article_id'])){
$viewQuery->execute([
    'id' => $id,
    'current_id' => $_GET['article_id']]);
}

$itemsQuery = $db->prepare("
    SELECT id, article, name
    FROM items
   
    ");
$itemsQuery->execute();

$viewCountQuery = $db->prepare("
        SELECT current_id
        FROM users
        WHERE id = :id
        ");
     
$viewCountQuery->execute(
   ['id' => $id]
 );
/*This gives you a list of items where the user = the current logged in user */
$ids = $viewCountQuery->rowCount() ? $viewCountQuery : [];
$items = $itemsQuery->rowCount() ? $itemsQuery : [];

?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style.css">
</head>
    <body>
    
       
      
         <?php  
        

        
         foreach($ids as $id){
            
             foreach($items as $item){
               
              if($item['id'] == $id['current_id']){
                 
                   if(!empty($item['article'])){
                     echo '<p class="ht">' . $item['name']; '</p>';
                   
                     echo '<p class = "at">' . $item['article'] . '</p>';
                   }
                 if(empty($item['article'])){ ?>
                   <form method = "post" action = "addArticle.php">
                   
                   <textarea class="tt" name = "name" autocomplete = "off" placeholder = "Type article here" required></textarea>
                   <br>
                   <input class = "sb" type = "submit" name = "submit" value = "Publish">
                   </form>
            <?php } 
            }
         }
      }
    
    
      
                  
          ?>
 <br>
 <a class = "rh" href="index.php">Return Home</a>
           
    </body>
</html>