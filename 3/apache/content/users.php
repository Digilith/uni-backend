<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <title>Genres</title>
    </head>
    <body>
        <h1>Genres</h1>
        <a href="index.html">Back to Homepage</a>
        <h1>User List</h1>
        <ol>
            <?php
            $mysqli = new mysqli("db", "root", "password", "bookstore");
            $result = $mysqli->query("SELECT * FROM users;");
            foreach ($result as $row){
                echo "<li>{$row['surname']} {$row['name']}</li>";
            }
            ?>
        </ol>
        <a href="admin/admin.php">Admins</a>
    </body>
</html>