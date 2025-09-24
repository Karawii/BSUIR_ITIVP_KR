<?php
include 'config.php';

$query = "SELECT * FROM recipes ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список задач</title>
</head>
<body>
    <h1>Список задач</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Время приготовления</th>
            <th>Ингредиенты</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th>Действия</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['cooking_time']; ?> минут</td>
            <td><?php echo $row['ingredients']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Изменить</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Удалить</a>
                <a href="update_status.php?id=<?php echo $row['id']; ?>&status=<?php echo !$row['status']; ?>">
                    <?php echo $row['status'] ? 'Отметить не выполненной' : 'Отметить выполненной'; ?>
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="add.php">Добавить новый ингридиент</a>
</body>
</html>