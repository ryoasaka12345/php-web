<!DOCTYPE html>
<?php
function print_arr($arr)
{
    foreach ($arr as $elem) {
        echo $elem, ", ";
    }
    echo "<br>";
}
?>

<head>
    <title>PHP MySQL</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: white;
        }
    </style>
</head>

<body>
    <p>
        <?php
        $connection = new mysqli("localhost", "root", "***", "php_web");
        if ($connection->connect_error != null) {
            echo "Failed to connect to MySQL: " . $connection->connect_error;
        } else {
            echo "connected to MySQL successfully";
        }
        $sql_query = "SELECT * FROM users";
        $result = $connection->query($sql_query);

        if ($result->num_rows > 0) {
            echo "<br>Result: <br>";
            while ($row = $result->fetch_array()) {
                print_arr($row);
            }
        } else {
            echo "0 results";
        }

        $result = $connection->query($sql_query);
        ?>
    </p>

    <h2>Users</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()){ ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['fullname'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                </tr>
            <?php } // end while ?>
        <? } // end if ?>
    </table>
<?php } //end of if for handling connection error ?>
</body>
