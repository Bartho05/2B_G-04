<?php
require_once 'config.php';
require_once 'credentials.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $user = authenticate($username, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        $_SESSION['login_error'] = null;
    } else {
        $_SESSION['login_error'] = 'Usuário ou senha inválidos.';
    }
}

header('Location: index.php');
exit;
