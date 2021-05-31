<!DOCTYPE html>
<head>
    <title>PHP MySQL - Insert Data</title>
</head>
<body>
    <h2>Create an User</h2>
    <form action="./mysql_insert.php" method="post">
        <!-- action: where to send -->
        <p>Full Name: <input type="text" name="fullname"></p>
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="password" name="password"></p>
        <p>E-mail: <input type="text" name="email"></p>
        <p><input type="submit" value="Create User"></p>
    </form>

    <?php
    if (!empty($_POST)) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $connection = new mysqli("localhost", "root", "***", "php_web");
        if ($connection->connect_error != null){
            echo "<p>Failed to connect to MySQL: ". $connection->connect_error. '</p>';
        } else {
            $sql = "INSERT INTO users(`fullname`, `username`, `password`, `email`) VALUE ('$fullname', '$username', '$password', '$email')";
            if (!$connection->query($sql)) {
                echo "<p>Failed to insert data. Error: ". $connection->error. "</p>";
            } else {
                echo '<p>Created a new records successfully, 
                        access <a target "_brank" href="./mysql_query.php">Here </a> to check</p>';
            }
        }
    }
    ?>
</body>
</html>
