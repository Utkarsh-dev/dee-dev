<?php
include '../includes/connect.php';

$name = $_POST["name"];
$price = $_POST["price"];
$category = $_POST["category"];


try {
    
    $stmt = $con->prepare("INSERT INTO items (name,category_id, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $category, $price);
	$stmt->execute();
	$stmt->close();
} catch (Exception $e) {
   
   die($e->getMessage());
}

header("location: ../admin-page.php");
?>