<?php
include 'config.php';

$query = "SELECT * FROM recipes ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список ингридиентов</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .button {
            display: inline-block;
            padding: 8px 12px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            color: white;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .edit-button {
            background-color: #2196F3;
        }
        .edit-button:hover {
            background-color: #1E88E5;
        }
        .delete-button {
            background-color: #f44336;
        }
        .delete-button:hover {
            background-color: #e53935;
        }
        .status-button {
            background-color: #FFC107;
        }
        .status-button:hover {
            background-color: #ffb300;
        }
        .add-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .add-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Список задач</h1>
    <table>
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
                <a class="button edit-button" href="edit.php?id=<?php echo $row['id']; ?>">Изменить</a>
                <a class="button delete-button" href="delete.php?id=<?php echo $row['id']; ?>">Удалить</a>
                <a class="button status-button" href="update_status.php?id=<?php echo $row['id']; ?>&status=<?php echo !$row['status']; ?>">
                    Переключить статус
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a class="add-button" href="add.php">Добавить новый ингредиент</a>
</body>
</html>