<?php

require_once 'init.php';

$usersQuery = $db->prepare(" 
INSERT INTO users (username, password) 
VALUES (:username, :password)
");
$useridQuery = $db->prepare("
SELECT id, username, password
FROM users
WHERE username = :username AND password = :password");


if(isset($_POST['username'], $_POST['password'])){
$usersQuery->execute([
    'username' => $_POST['username'],
    'password' => $_POST['password']

    
]);
$useridQuery->execute([
'username' => $_POST['username'], 'password' => $_POST['password']]);
$users = $useridQuery->rowCount() ? $useridQuery : [];
foreach($users as $user){
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
}
}
header("Location: index.php");