<!DOCTYPE html>
<head>
    <title> PHP MySQL - Update Data</title>
</head>
<body>
    <h2>Update an User</h2>
    <?php
        $user_id = $_GET['id'];

        $connection = new mysqli("localhost", "root", "***", "php_web");

        if ($connection->connect_error != null) {
            echo "<p>Failed to connect to MySQL: ". $connection->connect_error . "</p>";
        } else {

            if (!empty($_POST)) {
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];

                $sql = "UPDATE users SET
                    fullname = '$fullname',
                    username = '$username',
                    password = '$password',
                    email = '$email'
                    WHERE id = $user_id";

                if(!$connection->query($sql)){
                    echo "<p>Failde to update data. Error: ". $connection->error. "</p>";
                } else {
                    echo '<p>Updated user successfully, 
                            access <a target="_brank" href="./mysql_query.php">Here</a> to check </p>';
                }
            }

            $sql_query = "SELECT * FROM users WHERE id = $user_id";
            $result = $connection->query($sql_query);

            $user = $result->fetch_array() ?? false;
        }
    ?>

    <?php if ($user) { ?>
    <!-- action: where to send -->
    <form action="./mysql_update.php?id=<?php echo $user_id; ?>" method="post">
        <p>Full Name: <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>"></p>
        <p>Username: <input type="text" name ="username" value="<?php echo $user['username']; ?>"></p>
        <p>Password: <input type="password" name="password" value="<?php echo $user['password']; ?>"></p>
        <p>E-mail: <input type="text" name="email" value="<?php echo $user['email']; ?>"></p>
        <p><input type="submit" value="Update User"></p>
    </form>
    <?php } else { ?>
        <p>User not found</p>
    <?php } ?>
</body>
</html>
