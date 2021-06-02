<?php
if (!$user) {
    header("location: index.php");
} else {
    $user_id = $user["id"];
    $user_pw = $user["password"];
}

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

    if ($newPass != $confPass ) {
        unset($_POST);
        header("location: index.php?m=changePassword&confMatch=0");
    } elseif ($user_pw != $curPass) {
        unset($_POST);
        header("location: index.php?m=changePassword&curMatch=0");
    } else {
        // Define excute SQL query
        $sql = "UPDATE users SET password = '$newPass' WHERE id = $user_id";

        // An array to contain errors
        $errors = [];
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
        <?php
        // Check if confirm password is different
        if (isset($_GET['confMatch']) && !$_GET['confMatch']) { ?>
            <p>Does not match confirm password</p>
        <?php
        } elseif (isset($_GET['curMatch']) && !$_GET['curMatch']) { ?>
            <p>Does not match current password</p>
        <?php } ?>

        <h3>Change Password</h3>
        
        <?php
        // Check if there is any error
        if (isset($errors) && !empty($error)) {
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
            <form method = "post" class="form-cahngePassword">
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
