<?php require 'inc/db.php'; require 'inc/functions.php'; $title='Services - EliteServiceSet'; include 'inc/header.php'; $services = $pdo->query("SELECT * FROM services ORDER BY id DESC")->fetchAll(); ?>
<section>
<h5>Explore</h5><br/>
    <h2 class="mb-5" style="margin-top:-20px;">Our Services</h2>
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
<section class="mb-5 mt-5">
<h2 class="mb-5">Other Featured Services</h2>


<div class="row g-0 align-items-center mb-5">
        <div class="col-md-6"><img src="assets/uploads/cleaning-laundry.jpg" style="height:300px;width:95%;" class="rounded-start"
                alt="services" style="width:95%;height:100%;object-fit:cover;" /></div>
        <div class="col-md-6 p-4">
            <h4>Pick Up & Delivery Dry<br>
        Cleaning & Laundry Services</h4>
            <p>We provide comprehensive laundry and cleaning solutions designed for convenience and quality.
            Our services include pickup and delivery dry cleaning, thorough table cleaning, and expert laundry care, ensuring your garments and spaces are spotless, fresh, and impeccably maintained.</p>
        </div>
    </div>
    <div class="row g-0 align-items-center mb-5">
        <div class="col-md-6"><img src="assets/uploads/modern-kitchen.jpg" style="height:300px;width:95%;" class="rounded-start"
                alt="services" style="width:100%;height:100%;object-fit:cover;" /></div>
        <div class="col-md-6 p-4">
            <h4>Kitchen Remodeling Services</h4>
            <p>Our kitchen remodeling service transforms ordinary spaces into functional and elegant designs tailored to your lifestyle.
                 From concept development and material selection to procurement and final installation, we manage every step with precision and care.
                 We focus on blending aesthetics with practicality to create kitchens that inspire comfort, efficiency, and modern living.</p>
        </div>
    </div>

   
    <div class="row g-0 align-items-center mb-5">
        <div class="col-md-6"><img src="assets/uploads/accomoddation.jpg" style="height:300px;width:95%;" class="rounded-start"
                alt="services" style="width:100%;height:100%;object-fit:cover;" /></div>
        <div class="col-md-6 p-4">
            <h4>Accommodation & <br/>Settle-In Services</h4>
            <p>We make moving effortless through our allocation and departure support, professional movers, and organized packing and unpacking.
                 From item setup to home arrangement, we ensure a smooth and comfortable settling-in experience.</p>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>