<?php
session_start();
$_SESSION["username"] = '';


if (isset($_COOKIE['remember_username'])) {
    unset($_COOKIE['remember_username']);
    setcookie('remember_username', '', time() - 3600, '/');
    
}

header("Location: index.php");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">Pagina principala</a>

</body>
</html>