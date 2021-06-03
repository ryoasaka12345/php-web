<?php
/* 
        Define an array to contain page titles
    */
$pageTitles = array(
    'home' => "Home",
    "profile" => "My Profile",
    "register" => "Register", // page title for register
    "login" => "login",
    "changePassword" => "changePassword"
);

/* 
        Get page title depend on what is using module. 
    */
$pageTitle = $pageTitles[$module];

/* 
        show logged in user
    */
$userId = null;
if (isset($_SESSION['login_user_id'])) {
    $userId = $_SESSION['login_user_id'];
}

$user = false;
if ($userId) {
    // query user data by $username and $password
    $sql = "SELECT id, username, email, fullname, password
            FROM users
            WHERE id = $userId
            LIMIT 0, 1";

    $result = $mysql->query($sql);

    // if there is user information, mean that user is logged-in
    $user = $result->fetch_array() ?? false;
}

$fullname = $user ? $user['fullname'] : 'Guest';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="normalize.css">
    <meta charset="utf-8">
    <!-- use defined variable to render page title in HTML -->
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="./assets/css/index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="./assets/js/index.js"></script>
</head>

<body>
    <!-- The Header -->
    <header>
        <div id="logo">
            <h4>The logo <?php echo $userId; ?></h4>
        </div>
        <div>
            <h2 id="slogan">The header slogan</h2>
        </div>
        <div id="login">
            <ul>
                <li> Hi <span><?php echo $fullname; ?></span></li>
                <?php if (!$user) { ?>
                    <li><a href="javascript:void(0);" onclick="openMenu()"> Login</a>
                    <?php } else { ?>
                    <li><a href="./index.php?m=logout">Logout</a></li>
                <?php } ?>
            </ul>
            <div id="form1">
                <form action="./index.php?m=login" method="post">
                    <input type="text" name="username" placeholder="username" />
                    <input type="password" name="password" placeholder="password" />
                    <div>
                        <input type="checkbox" name="rememberusername" />
                        Remember username
                    </div>
                    <button type="submit" name="Login">LOGIN</button>
                </form>
            </div>
        </div>
        <div id="search">
            <form method="GET">
                <input type="text" name="keyword" />
                <i class="material-icons">search</i>
            </form>
        </div>
    </header>

    <!-- The menu -->
    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <?php if (!$user) { ?>
                <li><a href="./index.php?m=register">Register</a></li>
            <?php } else { ?>
                <li><a href="./index.php?m=profile">My Profile</a></li>
                <li><a href="./index.php?m=changePassword">Change Password</a></li>
            <?php } ?>
        </ul>
    </nav>
