<?php
if(session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/db.php';
function is_logged_in(){ return isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] === true; }
function require_admin(){ if(!is_logged_in()){ header('Location: /admin/login.php'); exit; } }
