<?php
require 'init.php';
if(isset($_SESSION['user_id'])){
$itemsQuery = $db->prepare("
SELECT id, name, article
FROM items
WHERE user = :user");

$itemsQuery->execute([
   
    'user' => $_SESSION['user_id']
]);

/*This gives you a list of items where the user = the current logged in user */

$items = $itemsQuery->rowCount() ? $itemsQuery : [];
}

?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="google-site-verification" content="fJOZMTxx2hsDLpcloZL2ZCPT4Ng6MPkU_R32SqyacEQ" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>You Post</title>
       
    </head>
    <body>
    <div class = "links">
    <a href = "test.php">SignUp/Login</a>
    <a href = "index.php">My Account</a>
    <a href = "nonuser.php">View Articles</a>
    </div>
    <?php if(isset($_SESSION['user_id'])){ 
      ?>
   
        <div class="list">
            <h1 class="header">Articles</h1>
            <?php if(!empty($items)): ?>
            <ul class="items">     
            <?php foreach ($items as $item): ?>
               
                <li>
                    <?php if(!empty($item['article'])) { 
                        $article = $item['article'];
                        $created = 'yes';
                      }
                      else{
                        $article = 'No article created';
                        $created = 'no';
                      }
                      ?>
                      <?php $yes = "yes"; ?>
                    
                    <a class="g"href = "viewArticle.php?&article_id=<?php echo $item['id'] ?>&created=<?php echo $created ?>&article=<?php echo $article?>">    <?php echo $item['name']; ?>     </a>
                    <a href = "delete.php?id=<?php echo $item['id'] ?>" class="db">Delete</a>
                    <?php if(is_null($item['article'])){ ?>
                    <a class="eb" href = "viewArticle.php?&article_id=<?php echo $item['id'] ?>&created=<?php echo $created ?>&article=<?php echo $article?>">tap article to edit</a>
                  <?php } ?>
                </li>
              
             
                <?php endforeach ?>
            </ul>
            <?php else: ?>
            <p> You don't have any articles </p>
            
              <?php endif ?>
            <form class="item-add" action="add.php" method="post">
            <input type="text" name="name" placeholder="Type the title of the article here" class="input" autocomplete="off" required>
            <input type="submit" value="Create" class="submit">
      
            </form>
            
        </div>
        <div class = "log_out">
            <a class = "log_out_link" href = "init.php?logout">Log Out</a>
        </div>
        <?php }
        else{  ?>
            <div class="list">
            <h1 class="header_not_logged_in">You are not logged in</h1>
            <br>
            <a class = "c" href = "test.php">SignUp/Login</a>
            </div>
        <?php }
        ?>
    </body>
</html>
