<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
$sessionName = 'cart';
$sessionValue = 'dress,watch';

if (!isset($_SESSION[$sessionName])) {
    $_SESSION[$sessionName] = $sessionValue;
    echo "Set session: name=$sessionName, value=$sessionValue";
} else {
    $cart = $_SESSION[$sessionName];
    echo "Sesion $sessionName has value $cart";
}
?>
</body>
</html>
