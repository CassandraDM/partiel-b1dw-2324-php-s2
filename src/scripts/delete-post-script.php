<?php
$connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
// prepare request
$request = $connectDatabase->prepare("DELETE FROM post WHERE id = :id");
// bind param
$request->bindParam(':id', $_GET['id']);
// execute request
$request->execute();

header('Location: ../post.php');

?>