<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <title>Users</title>
    </head>
    <body>
        <h1>Users</h1>
        <a href="index.html">Back to Homepage</a>
        <h1>User List</h1>
        <ol>
            <?php
            $mysqli = new mysqli("db", "user", "password", "bookstore");
            $result = $mysqli->query("SELECT * FROM users;");
            foreach ($result as $row){
                echo "<li>{$row['surname']} {$row['name']}</li>";
            }
            ?>
        </ol>
        <a href="admin/admin.php">Admins</a>
    </body>
</html>