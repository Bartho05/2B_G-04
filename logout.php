<?php
ob_start();

require_once 'config.php';

$_SESSION = [];
session_destroy();

ob_end_clean();
header('Location: index.php');
exit;
