<?php require_once __DIR__ . '/../inc/auth.php'; require_once __DIR__ . '/../inc/csrf.php'; require_admin();
if($_SERVER['REQUEST_METHOD']==='POST'){
  if(!verify_csrf($_POST['csrf'] ?? '')) die('Invalid CSRF');
  $action=$_POST['action'] ?? '';
  if($action==='create' || $action==='update'){
    $id=(int)($_POST['id'] ?? 0);
    $title=$_POST['title'] ?? ''; $slug=$_POST['slug'] ?? ''; $type=$_POST['type'] ?? 'Residential'; $desc=$_POST['description'] ?? '';
    $image=null;
    if(!empty($_FILES['image']['name'])){ $up=__DIR__.'/../assets/uploads/'; if(!is_dir($up)) mkdir($up,0755,true); $fname=time().'_'.basename($_FILES['image']['name']); if(move_uploaded_file($_FILES['image']['tmp_name'],$up.$fname)) $image=$fname; }
    if($action==='create'){ $stmt=$pdo->prepare("INSERT INTO projects (title,slug,type,description,image) VALUES (?,?,?,?,?)"); $stmt->execute([$title,$slug,$type,$desc,$image]); }
    else { if($image){ $stmt=$pdo->prepare("UPDATE projects SET title=?,slug=?,type=?,description=?,image=? WHERE id=?"); $stmt->execute([$title,$slug,$type,$desc,$image,$id]); } else { $stmt=$pdo->prepare("UPDATE projects SET title=?,slug=?,type=?,description=? WHERE id=?"); $stmt->execute([$title,$slug,$type,$desc,$id]); } }
    header('Location: projects_crud.php'); exit;
  }
}
if(isset($_GET['delete'])){ $id=(int)$_GET['delete']; $pdo->prepare("DELETE FROM projects WHERE id=?")->execute([$id]); header('Location: projects_crud.php'); exit; }
$items=$pdo->query("SELECT * FROM projects ORDER BY id DESC")->fetchAll();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Manage Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Modern Luxury Theme -->
    <link rel="stylesheet" href="assets/css/theme.css">
</head>

<body>
    <div class="container py-4"><a href="dashboard.php">« Back</a>
        <h3>Projects</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody><?php foreach($items as $it): ?><tr>
                    <td><?=$it['id']?></td>
                    <td><?=$it['title']?></td>
                    <td><?=$it['type']?></td>
                    <td><?php if($it['image']): ?><img src="../assets/uploads/<?=$it['image']?>"
                            style="height:50px"><?php endif; ?></td>
                    <td><a class="btn btn-sm btn-secondary" href="?edit=<?=$it['id']?>">Edit</a> <a
                            class="btn btn-sm btn-danger" href="?delete=<?=$it['id']?>"
                            onclick="return confirm('Delete?')">Delete</a></td>
                </tr><?php endforeach; ?></tbody>
        </table>
        <hr>
        <?php if(isset($_GET['edit'])){ $editid=(int)$_GET['edit']; $ed=$pdo->prepare('SELECT * FROM projects WHERE id=?'); $ed->execute([$editid]); $ep=$ed->fetch(); ?>
        <h5>Edit Project</h5><?php } else { ?><h5>Add Project</h5><?php } ?><form method="post"
            enctype="multipart/form-data"><input type="hidden" name="csrf" value="<?=csrf_token()?>"><input
                type="hidden" name="action" value="<?=isset($ep)?'update':'create'?>"><input type="hidden" name="id"
                value="<?=isset($ep)?$ep['id']:''?>">
            <div class="mb-3"><label>Title</label><input name="title" class="form-control" required
                    value="<?=isset($ep)?$ep['title']:''?>"></div>
            <div class="mb-3"><label>Slug</label><input name="slug" class="form-control"
                    value="<?=isset($ep)?$ep['slug']:''?>"></div>
            <div class="mb-3"><label>Type</label><select name="type" class="form-control">
                    <option <?=isset($ep) && $ep['type']=='Residential'?'selected':''?>>Residential</option>
                    <option <?=isset($ep) && $ep['type']=='Commercial'?'selected':''?>>Commercial</option>
                </select></div>
            <div class="mb-3"><label>Description</label><textarea name="description"
                    class="form-control"><?=isset($ep)?$ep['description']:''?></textarea></div>
            <div class="mb-3"><label>Image</label><input type="file" name="image" class="form-control"></div><button
                class="btn btn-primary"><?php if(isset($ep)) echo 'Save'; else echo 'Add'; ?></button>
        </form>
    </div>
    <script src="assets/js/theme.js"></script>
</body>

</html>