<?php
$cookieName = 'my_email';
$cookieValue = 'john@example.com';

if (!isset($_COOKIE[$cookieName])) {
    // Set cookie
    setcookie($cookieName, $cookieValue, time() + 30*24*60*60, '/');
    echo "Set cookie: name=$cookieName, value=$cookieValue";
} else {
    $email = $_COOKIE[$cookieName];
    echo "Cookie $cookieName has value $email";
}
?>
