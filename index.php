<?php
// turn on putput buffering
ob_start(); 

// Get modules need to use for main content by using $_GET
if (isset($_GET['m'])) {
    $module = $_GET['m'];
} else {
    $module = null;
}

// If there is no get param to load page, set $module default to home page
if ($module == null) {
    $module = 'home';
}

// require Class to connect and Execute query
require __DIR__ . '/config.php';
require __DIR__ . '/libs/db.php';

// define mysql object
$mysql = new DB(
    $db_config['host'],
    $db_config['user'],
    $db_config['password'],
    $db_config['db_name']
);

# Include header
require __DIR__ . '/modules/partials/header.php';
# Include main contain

require __DIR__ . "/modules/$module.php";

# Include footer
require __DIR__ . '/modules/partials/footer.php';

ob_end_flush();
