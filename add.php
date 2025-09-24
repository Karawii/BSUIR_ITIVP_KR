<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cooking_time = $_POST['cooking_time'];
    $ingredients = $_POST['ingredients'];
    $status = 'В разработке';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить рецепт</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #2196F3;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Добавить новый рецепт</h1>
    <form method="POST">
        <label>Название:</label>
        <input type="text" name="title" required>
        <label>Описание:</label>
        <textarea name="description" required></textarea>
        <label>Время приготовления (мин):</label>
        <input type="number" name="cooking_time" required>
        <label>Ингредиенты:</label>
        <textarea name="ingredients" required></textarea>
        <input type="submit" value="Сохранить">
    </form>
    <a href="index.php">Назад</a>
</body>
</html>