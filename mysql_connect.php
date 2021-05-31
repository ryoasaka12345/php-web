<!DOCTYPE html>
<head>
    <title>PHP MySQL</title>
</head>
<body>
    <p>
        <?php
            $connection = new mysqli("localhost", "root", "***", "php_web");
            if ($connection->connect_error != null) {
                echo "Failed to connect to MySQL: " . $connection->connect_error;
            } else {
                echo "Connected to MySQL successfully";
                $connection->close();
            }
        ?>
    </p>
</body>
