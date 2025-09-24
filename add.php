<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cooking_time = $_POST['cooking_time'];
    $ingredients = $_POST['ingredients'];
    $status = 'не выполнена';

    $query = "INSERT INTO recipes (title, description, cooking_time, ingredients, status) 
              VALUES ('$title', '$description', $cooking_time, '$ingredients', '$status')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить ингридиент</title>
</head>
<body>
    <h1>Добавить новую задачу</h1>
    <form method="POST">
        <label>Название:</label><br>
        <input type="text" name="title" required><br>
        <label>Описание:</label><br>
        <textarea name="description" required></textarea><br>
        <label>Время приготовления (мин):</label><br>
        <input type="number" name="cooking_time" required><br>
        <label>Ингредиенты:</label><br>
        <textarea name="ingredients" required></textarea><br>
        <input type="submit" value="Сохранить">
    </form>
    <a href="index.php">Назад</a>
</body>
</html>