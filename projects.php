<?php require 'inc/db.php'; require 'inc/functions.php'; $title='Projects - EliteServiceSet'; include 'inc/header.php'; $projects=$pdo->query("SELECT * FROM projects ORDER BY created_at DESC")->fetchAll(); ?>



<style>
    .projects-grid{
        display:flex;
        justify-content: flex-start;
        flex-direction:row;
        flex-wrap: wrap;
    }
</style>
<section class="mb-3 d-flex justify-content-between align-items-center">
    <h2>Projects</h2>
    <div><a href="#" class="btn btn-sm btn-outline-secondary me-1" data-filter="all">All</a><a href="#"
            class="btn btn-sm btn-outline-secondary me-1" data-filter="Residential">Residential</a><a href="#"
            class="btn btn-sm btn-outline-secondary me-1" data-filter="Commercial">Commercial</a></div>
</section>
<div class="projects-grid">
    <?php foreach($projects as $p): ?>
    <div class="project-card" style="width:450px;" data-type="<?=esc($p['type'])?>">
        <div class="card card-project shadow-sm">
            <img style="width:100%;" data-src="<?php if(!empty($p['image'])) echo 'assets/uploads/'.esc($p['image']); else echo 'assets/uploads/proj_res1.jpg'; ?>"
                src="assets/uploads/proj_res1.jpg" loading="lazy" alt="<?=esc($p['title'])?>">
            <div class="p-3">
                <h5 class="mb-1"><?=esc($p['title'])?></h5>
                <p class="small text-muted mb-0"><?=esc(substr($p['description'],0,120))?>...</p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<section class="mb-5">
    <div class="row g-0 align-items-center">
        <div class="col-md-6"><img src="assets/uploads/projects_block.jpg" class="img-fluid rounded-start"
                alt="projects" style="width:100%;height:100%;object-fit:cover;" /></div>
        <div class="col-md-6 p-4">
            <h3>More Projects</h3>
            <p>We update our portfolio regularly — check back for new renovations, remodelling stories, and before/after
                images showing our craftsmanship.</p>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>