<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href = "style.css">
</head>
</html>
<?php
require_once 'init.php';
$articlesQuery = $db->prepare("
SELECT name, article
FROM items
WHERE name = :name");

if(isset($_GET['article_name'])){
$articlesQuery->execute([
'name' => $_GET['article_name']]);
    
}
$articles = $articlesQuery->rowCount() ? $articlesQuery : [];

if(isset($_GET['article_name'])){
foreach($articles as $article){
    if($article['name'] == $_GET['article_name']){
        echo '<p class = "ht">' . $article['name'] . '</p>';
        echo '<p class = "at">' . $article['article'] . '</p>';
        
    }
}
}
?>
<br>
<div class = "margin">
<a href = "nonuser.php" class = "rhv">Return Home</a>
</div>