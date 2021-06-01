<?php
// Define variable to check if user is not registered
if (isset($_GET['success'])) {
    $isSuccess = $_GET['success'];
} else {
    $isSuccess = null;
}

// Reveive post data
if (!empty($_POST)) {
    $fullname = addslashes($_POST['fullname']);
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $password = md5($_POST['password']);

    // Define excute SQL query
    $sql = "INSERT INTO users(fullname, username, email, password)
        VALUE('$fullname', '$username', '$email', '$password')";
    
    // An array to contain errors
    $errors = [];
    try {
        $result = $mysql->query($sql);
        header('Location: index.php?m=register&success=true');
        exit;
    } catch (Exception $e){
        array_push($errors, $e->getMessage());
    }
}
?>

<!-- MAIN content -->
<div id = "main">
    <div id="main-content">
        <h3>Register User</h3>
        <form method="post" class="form-register">
            <p>
                <label>Username: </label>
                <input type="text" name="username" />
            </p>
            <p>
                <label>Email: </label>
                <input type="text" name="email" />
            </p>
            <p>
                <label>Full Name: </label>
                <input type="text" name="fullname" />
            </p>
            <p>
                <label>Password: </label>
                <input type="password" name="password" />
            </p>
            <p><input type="submit" value="Register"/></p>
        </form>
    </div>
    <!-- embed sidebar.php -->
    <?php require __DIR__. '/partials/sidebar.php'; ?>
</div>
