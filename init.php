<?php 
/*connects to the database */  




$db = new PDO('mysql:dbname=epiz_27979942_youpost1;host=sql206.epizy.com', 'epiz_27979942', 'ckJ70jC9YaZ');
session_start();
if(isset($_GET['logout'])){
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    header("Location: index.php");
}
$userQuery = $db->prepare("
SELECT id, username, password
FROM users
WHERE username = :username AND password = :password
");
if(isset($_POST['username'], $_POST['password'])){
$userQuery->execute([
    'username' => $_POST['username'],
     
    'password' => $_POST['password']

]

);
}


$usersss = $userQuery->rowCount() ? $userQuery : [];

foreach($usersss as $user){
    
if(isset($_POST['username'], $_POST['password'])){
  
if($user['username'] == $_POST['username'] && $user['password'] == $_POST['password']){
    
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    
    header("Location: index.php");

}
}
 
}
if(isset($_POST['username'], $_POST['password'])){
if(!isset($_SESSION['user_id'])){
header("Location: test.php");
}
}
?>
