<?php require_once __DIR__ . '/../inc/auth.php'; require_once __DIR__ . '/../inc/csrf.php'; require_admin();
if($_SERVER['REQUEST_METHOD']==='POST'){
  if(!verify_csrf($_POST['csrf'] ?? '')) die('Invalid CSRF');
  $action=$_POST['action'] ?? '';
  if($action==='create' || $action==='update'){
    $id=(int)($_POST['id'] ?? 0);
    $title=$_POST['title'] ?? ''; $short=$_POST['short'] ?? ''; $details=$_POST['details'] ?? '';
    if($action==='create'){ $pdo->prepare("INSERT INTO services (title,short,details) VALUES (?,?,?)")->execute([$title,$short,$details]); }
    else { $pdo->prepare("UPDATE services SET title=?, short=?, details=? WHERE id=?")->execute([$title,$short,$details,$id]); }
    header('Location: services_crud.php'); exit;
  }
}
if(isset($_GET['delete'])){ $id=(int)$_GET['delete']; $pdo->prepare("DELETE FROM services WHERE id=?")->execute([$id]); header('Location: services_crud.php'); exit; }
$items=$pdo->query("SELECT * FROM services ORDER BY id DESC")->fetchAll();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Manage Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Modern Luxury Theme -->
    <link rel="stylesheet" href="assets/css/theme.css">
</head>

<body>
    <div class="container py-4"><a href="dashboard.php">« Back</a>
        <h3>Services</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Short</th>
                    <th></th>
                </tr>
            </thead>
            <tbody><?php foreach($items as $it): ?><tr>
                    <td><?=$it['id']?></td>
                    <td><?=$it['title']?></td>
                    <td><?=$it['short'] ?></td>
                    <td><a class="btn btn-sm btn-secondary" href="?edit=<?=$it['id']?>">Edit</a> <a
                            class="btn btn-sm btn-danger" href="?delete=<?=$it['id']?>"
                            onclick="return confirm('Delete?')">Delete</a></td>
                </tr><?php endforeach; ?></tbody>
        </table>
        <hr>
        <?php if(isset($_GET['edit'])){ $editid=(int)$_GET['edit']; $ed=$pdo->prepare('SELECT * FROM services WHERE id=?'); $ed->execute([$editid]); $es=$ed->fetch(); ?>
        <h5>Edit Service</h5><?php } else { ?><h5>Add Service</h5><?php } ?><form method="post"><input type="hidden"
                name="csrf" value="<?=csrf_token()?>"><input type="hidden" name="action"
                value="<?=isset($es)?'update':'create'?>"><input type="hidden" name="id"
                value="<?=isset($es)?$es['id']:''?>">
            <div class="mb-3"><label>Title</label><input name="title" class="form-control" required
                    value="<?=isset($es)?$es['title']:''?>"></div>
            <div class="mb-3"><label>Short</label><input name="short" class="form-control"
                    value="<?=isset($es)?$es['short']:''?>"></div>
            <div class="mb-3"><label>Details</label><textarea name="details"
                    class="form-control"><?=isset($es)?$es['details']:''?></textarea></div><button
                class="btn btn-primary"><?php if(isset($es)) echo 'Save'; else echo 'Add'; ?></button>
        </form>
    </div>
    <script src="assets/js/theme.js"></script>
</body>

</html>