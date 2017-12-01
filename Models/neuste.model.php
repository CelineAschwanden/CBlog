<?php 

$dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$stmt = $dbConnection->query("SELECT * FROM (SELECT * FROM beitraege ORDER BY id DESC LIMIT 3 ) sub ORDER BY id DESC");
$postsArray = $stmt->fetchAll();

?>