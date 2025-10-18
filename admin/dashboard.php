<?php require_once __DIR__ . '/../inc/auth.php'; require_admin(); $projects=$pdo->query("SELECT * FROM projects ORDER BY id DESC")->fetchAll(); $services=$pdo->query("SELECT * FROM services ORDER BY id DESC")->fetchAll(); $team=$pdo->query("SELECT * FROM team ORDER BY id DESC")->fetchAll(); ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Modern Luxury Theme -->
    <link rel="stylesheet" href="assets/css/theme.css">
</head>

<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Admin Dashboard</h3>
            <div><a class="btn btn-sm btn-outline-secondary me-2" href="profile.php">Profile</a><a
                    class="btn btn-sm btn-outline-secondary me-2" href="change_password.php">Change Password</a><a
                    class="btn btn-sm btn-outline-secondary me-2" href="testimonials_crud.php">Testimonials</a><a
                    class="btn btn-sm btn-secondary" href="logout.php">Logout</a></div>
        </div>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h6>Projects</h6>
                        <p class="display-6 mb-2"><?=count($projects)?></p><a href="projects_crud.php"
                            class="btn btn-primary btn-sm">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h6>Services</h6>
                        <p class="display-6 mb-2"><?=count($services)?></p><a href="services_crud.php"
                            class="btn btn-primary btn-sm">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h6>Team</h6>
                        <p class="display-6 mb-2"><?=count($team)?></p><a href="team_crud.php"
                            class="btn btn-primary btn-sm">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h6>Testimonials</h6>
                        <p class="display-6 mb-2">—</p><a href="testimonials_crud.php"
                            class="btn btn-primary btn-sm">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/theme.js"></script>
</body>

</html>