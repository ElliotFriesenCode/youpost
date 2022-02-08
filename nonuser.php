<?php
require_once 'init.php';
$articlesQuery = $db->prepare("
SELECT name, article, user, n
FROM items");



$articlesQuery->execute();
$articles = $articlesQuery->rowCount() ? $articlesQuery : [];



?>
<head>
<link rel = "stylesheet" href = "style.css">
</head>
<div class = "links">
    <a href = "test.php">SignUp/Login</a>
    <a href = "index.php">My Account</a>
    <a href = "nonuser.php">View Articles</a>
 </div>
<h1 class = "main_page_header">Articles</h1>
<div class = "list">
<?php
foreach($articles as $article){
    
    ?>
   
<ul class = "items">
<?php if($article['article'] != ''){ ?>
<li> 

<a href = "nonuserview.php?article_name=<?php echo $article['name'] ?>">

<?php echo $article['name']; ?> 
</a>
<a class="username"><?php echo $article['n'] ?></a>

</li>
<?php } ?>
</ul>


    <?php
    
}
?>

</div>
