<?php
include 'config.php';

$id = $_GET['id'];
$query = "SELECT status FROM recipes WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$new_status = ($row['status'] == 'Завершен') ? 'В разработке' : 'Завершен';
$update_query = "UPDATE recipes SET status='$new_status' WHERE id=$id";
mysqli_query($conn, $update_query);

header("Location: index.php");
?>