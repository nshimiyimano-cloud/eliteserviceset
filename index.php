<?php
require 'inc/db.php';
require 'inc/functions.php';

$title='Home - EliteServiceSet';
include 'inc/header.php';
$projects = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 8")->fetchAll();
$services = $pdo->query("SELECT * FROM services ORDER BY id DESC LIMIT 2")->fetchAll();
?>
<!-- Carousel above hero -->

<style>
     .projects-grid{
        display:flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        flex-direction:row;
    }

    #carousel-testimonials button{
        background:#000;
        width:50px;
        height:70px;
        margin-top:9%;
    }

    
</style>
<div id="showcaseCarousel" class="carousel slide mb-4" data-bs-ride="carousel">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/uploads/carousel_bathroom.jpg" class="d-block w-100" style="height:450px;" alt="...">
            <div class="carousel-caption d-none d-md-block" style="background:#C8A165;">
                
                <h5 style="color:#333;">Beautiful Kitchens, Every Day</h5>
                <p>Functional layouts and premium finishes.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/uploads/accomoddation.jpg" class="d-block w-100" style="height:450px;" alt="...">
            <div class="carousel-caption d-none d-md-block" style="background:#C8A165;">
                <h5 style="color:#333;">Modern Interiors, Timeless Comfort</h5>
                <p>Thoughtful design and expert execution.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/uploads/House_room.jpg" class="d-block w-100" style="height:450px;" alt="...">
            <div class="carousel-caption d-none d-md-block" style="background:#C8A165;">
            <h5 style="color:#333;">Transforming Spaces with Style</h5>
            <p>EliteServiceSet - Commercial & Residential Renovation Experts</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#showcaseCarousel" data-bs-slide="prev"><span
            class="carousel-control-prev-icon"></span></button>
    <button class="carousel-control-next" type="button" data-bs-target="#showcaseCarousel" data-bs-slide="next"><span
            class="carousel-control-next-icon"></span></button>
</div>

<section class="hero mb-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="display-5">Beautiful spaces, made to live in.</h1>
            <h5><small>We make your home better</small></h5>
            <p class="lead">Commercial and residential renovation and remodeling — thoughtful, functional, and
                aesthetic.</p>
            <a href="projects.php" class="btn btn-lg btn-primary me-2">View Projects</a>
            <a href="contact.php" class="btn btn-outline-primary">Get a Quote</a>
        </div>
        <div class="col-md-6 text-end">
            <img src="assets/uploads/House_room.jpg" alt="hero" class="img-fluid rounded-3 shadow"
                style="max-height:420px;object-fit:cover;">
        </div>
    </div>
</section>

<section class="mb-5">
    <h2 class="mb-3">Our latest projects</h2>
    <div class="projects-grid">
        <?php foreach($projects as $p): ?>
        <div class="project-card" style="width:450px;"  data-type="<?=esc($p['type'])?>">
            <div class="card card-project shadow-sm">
                <img style="width:100%;height:400px;" data-src="<?php if(!empty($p['image'])) echo 'assets/uploads/'.esc($p['image']); else echo 'https://source.unsplash.com/800x600/?'.urlencode($p['type']).'%2Cinterior'; ?>"
                    src="<?php if(!empty($p['image'])) echo 'assets/uploads/'.esc($p['image']); else echo 'https://source.unsplash.com/800x600/?'.urlencode($p['type']).'%2Cinterior'; ?>" loading="lazy" alt="<?=esc($p['title'])?>">

                <div class="p-3">
                    <h5 class="mb-1"><?=esc($p['title'])?></h5>
                    <p class="small text-muted mb-0"><?=esc(substr($p['description'],0,120))?>...</p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="mb-5">
    <h2 class="mb-3">Our Services</h2>
    <div class="row">
        <?php foreach($services as $s): ?>
        <div class="col-md-4 mb-3">
            <div class="card h-100" style="border:1px solid #E0B973">
                <div class="card-body">
                    <h5><?=esc($s['title'])?></h5>
                    <p class="text-light"><?=esc($s['short'])?></p>
                    <a href="services.php#service-<?=esc($s['id'])?>" class="btn btn-primary">Learn more</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Testimonials carousel (large quotes) -->
<section class="mb-5">
    <div class="bg-light text-dark py-5 rounded-3">
        <div class="container">
            <h2 class="mb-4 text-danger text-center">What Our Clients Say</h2>
            <div id="carousel-testimonials" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
                <div class="carousel-inner">
                    <?php
            $stmt = $pdo->query("SELECT * FROM testimonials ORDER BY created_at DESC LIMIT 6");
            $testis = $stmt->fetchAll();
            $first = true;
            foreach($testis as $t):
          ?>
                    <div class="carousel-item <?php if($first) { echo 'active'; $first=false; } ?> text-center">
                        <div class="mx-auto" style="max-width:900px;">
                         <img src="<?php if(!empty($t['photo'])) echo 'assets/uploads/'.$t['photo']; else echo 'assets/uploads/team_mark.jpg'; ?>"  style="width:150px;height:150px;border-radius:50%;border:1px solid #E0B973" loading="lazy" alt="client" srcset="">
                            <p class="display-6 fst-italic">“<?=esc($t['story'])?>”</p>
                            <p class="fw-bold mb-0 text-danger"><?=esc($t['client_name'])?> <span class="text-warning">—
                                    <?=esc($t['location'])?></span></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-testimonials"
                    data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel-testimonials"
                    data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
            </div>
        </div>
    </div>
</section>

<!-- Interactive block to encourage scroll -->
<section class="mb-5">
    <div class="row g-0 align-items-center">
        <div class="col-md-6">
        <img src="assets/uploads/salon.jpg" alt="hero" class="img-fluid rounded-3 shadow"
        style="max-height:420px;object-fit:cover;">
        </div>
        <div class="col-md-6 p-4">
            <h3>Explore More Designs</h3>
            <h5><small>Living room design ideas</small></h5>
            <p>Scroll through our gallery to discover varied styles — from minimal modern to classic luxury. Each
                section is filled with inspirational images and details about the work we did for our clients.</p>
            <p class="small text-danger"><a href="http://localhost/eliteserviceset/services.php" target="_blank" rel="noopener noreferrer">Click here to view more services on our service page for a complete
            portfolio.</a> </p>
        </div>
    </div>
</section>


<!-- Interactive block to encourage scroll -->
<section class="mb-5">
    <div class="row g-0 align-items-center">
        <div class="col-md-6">     

        <video autoplay loop muted playsinline class="img-fluid rounded-3 shadow"
        style="max-height:420px;object-fit:cover;">
    <source src="assets/uploads/video.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
        </div>
        <div class="col-md-6 p-4">
            <h3>Discover how thoughtful design transforms space into inspiration</h3>
            <h5>Our work make your dream true</h5>
            <h5><small>meeting room design ideas</small></h5>
            <p>This video showcases our dedication to creating interiors that not only meet functional needs but also reflect personality and purpose.
                 From modern meeting rooms to creative collaborative spaces, every detail is designed to enhance productivity and style.
                 Our work brings your vision to life because we believe great design doesn't just decorate a space, it defines it.
                 Let this video be a glimpse into how we turn your dream interiors into reality</p>
             
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>