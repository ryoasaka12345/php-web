<!-- MAIN content -->
<?php
    if (!$user) {
        header("location: index.php");
        exit;
    }
?>

<div id="main">
    <div id="main-content">
        <h3>My profile.</h3>
        <p>
            <?php
                echo " ID: " . $user["id"]. "<br>";
                echo "Name: " . $user["fullname"]. "<br>";
                echo " UN : " . $user["username"]. "<br>";
                echo "MAIL: " . $user["email"]. "<br>";
            ?>
        </p>
    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__. '/partials/sidebar.php'; ?>
</div>
