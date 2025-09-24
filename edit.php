<?php
include 'config.php';

$id = $_GET['id'];
$query = "SELECT * FROM recipes WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cooking_time = $_POST['cooking_time'];
    $ingredients = $_POST['ingredients'];

    $update_query = "UPDATE recipes SET title='$title', description='$description', 
                     cooking_time=$cooking_time, ingredients='$ingredients' 
                     WHERE id=$id";
    mysqli_query($conn, $update_query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать задачу</title>
</head>
<body>
    <h1>Редактировать задачу</h1>
    <form method="POST">
        <label>Название:</label><br>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
        <label>Описание:</label><br>
        <textarea name="description" required><?php echo $row['description']; ?></textarea><br>
        <label>Время приготовления (мин):</label><br>
        <input type="number" name="cooking_time" value="<?php echo $row['cooking_time']; ?>" required><br>
        <label>Ингредиенты:</label><br>
        <textarea name="ingredients" required><?php echo $row['ingredients']; ?></textarea><br>
        <input type="submit" value="Сохранить">
    </form>
    <a href="index.php">Назад</a>
</body>
</html>