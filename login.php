<?php
// Receive form data
$username = addslashes($_POST["username"]);
$password = md5($_POST["password"]);

$sql = "SELECT id, username, password
    FROM users
    WHERE username = '$username' AND password = '$password7'
    LIMIT 0, 1";

$result = $mysql->query($sql);
$user = $result->fetch_array() ?? false;

if (!$user) {
    echo "<p>Login failed</p>";
} else {
    $_SESSION["login_user_id"] = $user['id'];
    header('Location: index.php'); // redirect
}

?>
