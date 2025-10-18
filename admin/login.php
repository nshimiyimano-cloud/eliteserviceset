<?php
session_start();
require_once __DIR__ . '/../inc/db.php';
require_once __DIR__ . '/../inc/csrf.php';
// ensure admin exists
$check = $pdo->query("SELECT COUNT(*) as c FROM admin")->fetch();
if($check && $check['c']==0){ $pass = password_hash('Admin@123', PASSWORD_DEFAULT); $pdo->prepare("INSERT INTO admin (username,password) VALUES (?,?)")->execute(['admin',$pass]); }
$err='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  if(!verify_csrf($_POST['csrf'] ?? '')) $err='Invalid CSRF token.';
  else {
    $username = $_POST['username'] ?? ''; $password = $_POST['password'] ?? '';
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ? LIMIT 1"); $stmt->execute([$username]); $user = $stmt->fetch();
    if($user && password_verify($password,$user['password'])){ $_SESSION['admin_logged']=true; $_SESSION['admin_user']=$user['username']; header('Location: dashboard.php'); exit; } else $err='Invalid credentials.';
  }
}
?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin Login</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Modern Luxury Theme -->
<link rel="stylesheet" href="assets/css/theme.css">
</head><body><div class="container py-5"><div class="row justify-content-center"><div class="col-md-6"><h3>Admin Login</h3><?php if($err): ?><div class="alert alert-danger"><?=htmlspecialchars($err)?></div><?php endif; ?><form method="post"><input type="hidden" name="csrf" value="<?=csrf_token()?>"><div class="mb-3"><label>Username</label><input name="username" class="form-control" required></div><div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div><button class="btn btn-primary">Login</button></form></div></div></div>
<script src="assets/js/theme.js"></script>
</body></html>