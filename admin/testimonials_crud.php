<?php require_once __DIR__ . '/../inc/auth.php'; require_once __DIR__ . '/../inc/csrf.php'; require_admin();
if($_SERVER['REQUEST_METHOD']==='POST'){
  if(!verify_csrf($_POST['csrf'] ?? '')) die('Invalid CSRF');
  $action=$_POST['action'] ?? ''; $name=$_POST['client_name'] ?? ''; $loc=$_POST['location'] ?? ''; $story=$_POST['story'] ?? '';
  $photo=null; if(!empty($_FILES['photo']['name'])){ $up=__DIR__.'/../assets/uploads/'; if(!is_dir($up)) mkdir($up,0755,true); $fname=time().'_'.basename($_FILES['photo']['name']); if(move_uploaded_file($_FILES['photo']['tmp_name'],$up.$fname)) $photo=$fname; }
  if($action==='create'){ $pdo->prepare("INSERT INTO testimonials (client_name,location,photo,story) VALUES (?,?,?,?)")->execute([$name,$loc,$photo,$story]); }
  elseif($action==='update' && !empty($_POST['id'])){ $id=(int)$_POST['id']; if($photo){ $pdo->prepare("UPDATE testimonials SET client_name=?, location=?, photo=?, story=? WHERE id=?")->execute([$name,$loc,$photo,$story,$id]); } else { $pdo->prepare("UPDATE testimonials SET client_name=?, location=?, story=? WHERE id=?")->execute([$name,$loc,$story,$id]); } }
  header('Location: testimonials_crud.php'); exit;
}
if(isset($_GET['delete'])){ $id=(int)$_GET['delete']; $pdo->prepare("DELETE FROM testimonials WHERE id=?")->execute([$id]); header('Location: testimonials_crud.php'); exit; }
$items=$pdo->query("SELECT * FROM testimonials ORDER BY id DESC")->fetchAll();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Manage Testimonials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Modern Luxury Theme -->
    <link rel="stylesheet" href="assets/css/theme.css">
</head>

<body>
    <div class="container py-4"><a href="dashboard.php">« Back</a>
        <h3>Testimonials</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Location</th>
                    <th></th>
                </tr>
            </thead>
            <tbody><?php foreach($items as $it): ?><tr>
                    <td><?=$it['id']?></td>
                    <td><?=$it['client_name']?></td>
                    <td><?=$it['location']?></td>
                    <td><a class="btn btn-sm btn-secondary" href="?edit=<?=$it['id']?>">Edit</a> <a
                            class="btn btn-sm btn-danger" href="?delete=<?=$it['id']?>"
                            onclick="return confirm('Delete?')">Delete</a></td>
                </tr><?php endforeach; ?></tbody>
        </table>
        <hr>
        <?php if(isset($_GET['edit'])){ $editid=(int)$_GET['edit']; $ed=$pdo->prepare('SELECT * FROM testimonials WHERE id=?'); $ed->execute([$editid]); $e=$ed->fetch(); ?>
        <h5>Edit Testimonial</h5><?php } else { ?><h5>Add Testimonial</h5><?php } ?><form method="post"
            enctype="multipart/form-data"><input type="hidden" name="csrf" value="<?=csrf_token()?>"><input
                type="hidden" name="action" value="<?=isset($e)?'update':'create'?>"><input type="hidden" name="id"
                value="<?=isset($e)?$e['id']:''?>">
            <div class="mb-3"><label>Client Name</label><input name="client_name" class="form-control" required
                    value="<?=isset($e)?$e['client_name']:''?>"></div>
            <div class="mb-3"><label>Location</label><input name="location" class="form-control"
                    value="<?=isset($e)?$e['location']:''?>"></div>
            <div class="mb-3"><label>Story</label><textarea name="story"
                    class="form-control"><?=isset($e)?$e['story']:''?></textarea></div>
            <div class="mb-3"><label>Photo</label><input type="file" name="photo" class="form-control"></div><button
                class="btn btn-primary"><?php if(isset($e)) echo 'Save'; else echo 'Add'; ?></button>
        </form>
    </div>
    <script src="assets/js/theme.js"></script>
</body>

</html>