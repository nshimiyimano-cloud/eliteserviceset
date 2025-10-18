<?php require 'inc/db.php'; require 'inc/functions.php'; $title='Services - EliteServiceSet'; include 'inc/header.php'; $services = $pdo->query("SELECT * FROM services ORDER BY id DESC")->fetchAll(); ?>
<section>
    <h2>Our Services</h2>
    <div class="row"><?php foreach($services as $s): ?><div class="col-md-4 mb-4">
            <div class="card h-100 " style="border:1px solid #E0B973">
                <div class="card-body">
                    <h5><?=esc($s['title'])?></h5>
                    <p class="text-light"><?=esc($s['short'])?></p>
                    <p class="text-light"><?=nl2br(esc($s['details']))?></p>
                </div>
            </div>
        </div><?php endforeach; ?></div>
</section>
<section class="mb-5">
    <div class="row g-0 align-items-center">
        <div class="col-md-6"><img src="assets/uploads/services_block.jpg" class="img-fluid rounded-start"
                alt="services" style="width:100%;height:100%;object-fit:cover;" /></div>
        <div class="col-md-6 p-4">
            <h3>Design & Build</h3>
            <p>We cover concept, procurement and delivery — making renovations simple for our clients.</p>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>