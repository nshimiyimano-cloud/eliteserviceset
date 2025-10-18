<?php require_once __DIR__ . '/../inc/auth.php'; require_once __DIR__ . '/../inc/csrf.php'; require_admin();
if($_SERVER['REQUEST_METHOD']==='POST'){
  if(!verify_csrf($_POST['csrf'] ?? '')) die('Invalid CSRF');
  $action=$_POST['action'] ?? '';
  if($action==='create' || $action==='update'){
    $id=(int)($_POST['id'] ?? 0);
    $name=$_POST['name'] ?? ''; $role=$_POST['role'] ?? ''; $bio=$_POST['bio'] ?? '';
    $photo=null; if(!empty($_FILES['photo']['name'])){ $up=__DIR__.'/../assets/uploads/'; if(!is_dir($up)) mkdir($up,0755,true); $fname=time().'_'.basename($_FILES['photo']['name']); if(move_uploaded_file($_FILES['photo']['tmp_name'],$up.$fname)) $photo=$fname; }
    if($action==='create'){ $pdo->prepare("INSERT INTO team (name,role,bio,photo) VALUES (?,?,?,?)")->execute([$name,$role,$bio,$photo]); }
    else { if($photo){ $pdo->prepare("UPDATE team SET name=?, role=?, bio=?, photo=? WHERE id=?")->execute([$name,$role,$bio,$photo,$id]); } else { $pdo->prepare("UPDATE team SET name=?, role=?, bio=? WHERE id=?")->execute([$name,$role,$bio,$id]); } }
    header('Location: team_crud.php'); exit;
  }
}
if(isset($_GET['delete'])){ $id=(int)$_GET['delete']; $pdo->prepare("DELETE FROM team WHERE id=?")->execute([$id]); header('Location: team_crud.php'); exit; }
$items=$pdo->query("SELECT * FROM team ORDER BY id DESC")->fetchAll();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Manage Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Modern Luxury Theme -->
    <link rel="stylesheet" href="assets/css/theme.css">
</head>

<body>
    <div class="container py-4"><a href="dashboard.php">« Back</a>
        <h3>Team</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Photo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody><?php foreach($items as $it): ?><tr>
                    <td><?=$it['id']?></td>
                    <td><?=$it['name']?></td>
                    <td><?=$it['role']?></td>
                    <td><?php if($it['photo']): ?><img src="../assets/uploads/<?=$it['photo']?>"
                            style="height:50px"><?php endif; ?></td>
                    <td><a class="btn btn-sm btn-secondary" href="?edit=<?=$it['id']?>">Edit</a> <a
                            class="btn btn-sm btn-danger" href="?delete=<?=$it['id']?>"
                            onclick="return confirm('Delete?')">Delete</a></td>
                </tr><?php endforeach; ?></tbody>
        </table>
        <hr>
        <?php if(isset($_GET['edit'])){ $editid=(int)$_GET['edit']; $ed=$pdo->prepare('SELECT * FROM team WHERE id=?'); $ed->execute([$editid]); $et=$ed->fetch(); ?>
        <h5>Edit Team Member</h5><?php } else { ?><h5>Add Team Member</h5><?php } ?><form method="post"
            enctype="multipart/form-data"><input type="hidden" name="csrf" value="<?=csrf_token()?>"><input
                type="hidden" name="action" value="<?=isset($et)?'update':'create'?>"><input type="hidden" name="id"
                value="<?=isset($et)?$et['id']:''?>">
            <div class="mb-3"><label>Name</label><input name="name" class="form-control" required
                    value="<?=isset($et)?$et['name']:''?>"></div>
            <div class="mb-3"><label>Role</label><input name="role" class="form-control"
                    value="<?=isset($et)?$et['role']:''?>"></div>
            <div class="mb-3"><label>Bio</label><textarea name="bio"
                    class="form-control"><?=isset($et)?$et['bio']:''?></textarea></div>
            <div class="mb-3"><label>Photo</label><input type="file" name="photo" class="form-control"></div><button
                class="btn btn-primary"><?php if(isset($et)) echo 'Save'; else echo 'Add'; ?></button>
        </form>
    </div>
    <script src="assets/js/theme.js"></script>
</body>

</html>