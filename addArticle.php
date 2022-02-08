
<?php 
require_once 'init.php';
$itemQuery = $db->prepare("
SELECT id
FROM items
");
$id = $_SESSION['user_id'];
$itemQuery->execute();
$idQuery = $db->prepare("
SELECT current_id
FROM users
WHERE id = :id
");
$updateQuery = $db->prepare(" 
UPDATE items
SET article = :article
WHERE id = :id");
$idQuery->execute([
'id' => $id,

]);
$items = $itemQuery->rowCount() ? $itemQuery : [];
$ids = $idQuery->rowCount() ? $idQuery : [];
foreach($ids as $id){
$actualId = $id['current_id'];
}
foreach($items as $item){
       
          if(isset($_POST['name'])){
             echo "hi";
        
        $articleText = $_POST['name'];
        if($item['id'] == $actualId){
            
            $updateQuery->execute([
                'id' => $actualId,
                'article' => $articleText
                
            ]);
          
        }
        

    }

}
header('Location: viewArticle.php');
