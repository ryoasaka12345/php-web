<?php
// Define an array to contain page titles
$pageTitles = array(
    'home' => "Home",
    "profile" => "My Profile",
    "register" => "Register" // page title for register
);

// Get page title depend on what is using module. 
$pageTitle = $pageTitles[$module];
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
            <h4>The logo</h4>
        </div>
        <div>
            <h2 id="slogan">The header slogan</h2>
        </div>
        <div id="login">
            <ul>
                <li>Hi Guest</li>
                <li>
                    <a href="javascript:void(0);" onclick="openMenu()"> Login </a>
                </li>
            </ul>
            <div id="form1">
                <form>
                    <input type="text" placeholder="Username" />
                    <input type="text" placeholder="Password" />
                    <div>
                        <input type="checkbox" name="remember un" />
                        Remember username
                    </div>
                    <input type="button" name="Login" value="LOGIN" />
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
            <li><a href="./index.php?m=register">Register</a></li>
            <li><a href="./index.php?m=profile">My Profile</a></li>
        </ul>
    </nav>
