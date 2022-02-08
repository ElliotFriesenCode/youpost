<?php 
require_once 'init.php';

if(isset($_POST['name'])){
    $name = $_POST['name'];
    if(!empty($name)){
        $aq = $db->prepare("
        INSERT INTO items (name, user, created, n)
        VALUES (:name, :user, NOW(), :n)");

        $aq->execute(['name' => $_POST['name'], 'user' => $_SESSION['user_id'], 'n' => $_SESSION['username']]);

    }
}
header('Location: index.php');

?>