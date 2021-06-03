<?php
if (!$user) {
    header("location: index.php");
    exit;
}

$user_id = $user["id"];
$user_pw = $user["password"];

// define variable to check if success change passowrd
if (isset($_GET['success'])) {
    $isSuccess = $_GET['success'];
} else {
    $isSuccess = false;
}

// Process to change password
if (!empty($_POST)) {

    $curPass = md5($_POST['currentPassword']);
    $newPass = md5($_POST['newPassword']);
    $confPass = md5($_POST['confirmPassword']);

    // An array to contain errors
    $errors = [];

    if ($newPass != $confPass || $user_pw != $curPass) {
        unset($_POST);
        if ($newPass != $confPass) {
            array_push($errors, "Does not match confirm password");
        }
        if ($user_pw != $curPass) {
            array_push($errors, "Does not match current password");
        }
        print_r($errors);
    } else {
        // Define excute SQL query
        $sql = "UPDATE users SET password = '$newPass' WHERE id = $user_id";

        try {
            $result = $mysql->query($sql);
            header("location: index.php?m=changePassword&success=1");
            exit;
        } catch (Exception $e) {
            array_push($errors, $e->getMessage());
        }
    }
}
?>

<!-- MAIN content -->
<div id="main">
    <dib id="main-content">
        <h3>Change Password</h3>

        <?php
        // Check if there is any error
        if (isset($errors) && !empty($errors)) {
            foreach ($errors as $error) {
                echo "<p>" . $error . "</p>";
            }
        }
        ?>

        <?php
        //Show form if success to change password
        if (isset($_GET['success']) && $_GET['success']) { ?>
            <p>success to change password</p>
        <?php } else { ?>
            <form method="post" class="form-cahngePassword">
                <p>
                    <label>Current Password: </label>
                    <input type="password" name="currentPassword" />
                </p>
                <p>
                    <label>New Password: </label>
                    <input type="password" name="newPassword" />
                </p>
                <p>
                    <label>Confirm Password: </label>
                    <input type="password" name="confirmPassword" />
                </p>
                <p><input type="submit" value="Change Password" />
            </form>
        <?php } ?>
    </dib>

</div>
