<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Periksa peran untuk kontrol akses
$level = $_SESSION['level'];

switch ($level) {
    case 'admin':
        header('Location: admin.php');
        exit();
    case 'owner':
        header('Location: owner.php');
        exit();
    case 'kasir':
        header('Location: kasir.php');
        exit();
    case 'pelanggan':
        header('Location: pelanggan.php');
        exit();
    case 'waiter':
        header('Location: waiter.php');
        exit();
    default:
        // uknown role = error page
        header('Location: unauthorized.php');
        exit();
}
?>
