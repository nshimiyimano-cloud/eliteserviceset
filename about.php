<?php require 'inc/db.php'; require 'inc/functions.php'; $title='About Us - EliteServiceSet'; include 'inc/header.php'; ?>

<style>
  .section-dark{
    background-color:#475467;
    padding-top:50px;

}
.counter-grid{
    height:300px;
    justify-content:space-between;
    align-items:center;
    }


.counter-item .counter-label{
font-size: 20px;
color: lightblue;

}
</style>
<section class="mb-5">
    <h2>About Us</h2>
    <p>We are EliteServiceSet, an interior design and renovation company specializing in residential and commercial
        projects. Our mission is to transform spaces into functional and beautiful places that reflect our clients'
        lifestyles and brands.</p>
</section>
<section class="mb-5">
    <div class="row g-0 align-items-center">
        <div class="col-md-6"><img src="assets/uploads/about_block.jpg" class="img-fluid rounded-start" alt="about"
                style="width:100%;height:100%;object-fit:cover;" /></div>
        <div class="col-md-6 p-4">
            <h3>History of our creation</h3>
            <p>From boutique renovations to large commercial refurbishments, our studio brings craft and care to every
                project.</p>
        </div>
    </div>
</section>

<section class="section-dark">
    <div class="container">
        <h2 class="section-title text-center">Our Achievements</h2>
        <h1 class="counter-grid d-flex text-center align-items-center mt-4" id="counters">
            <div class="counter-item">
                <div class="counter-number" data-target="235">0+</div>
                <div class="counter-label">Design Awards</div>
            </div>
            <div class="counter-item">
                <div class="counter-number" data-target="86">0+</div>
                <div class="counter-label">Years Experience</div>
            </div>
            <div class="counter-item">
                <div class="counter-number" data-target="17">0+</div>
                <div class="counter-label">Design Partners</div>
            </div>
            <div class="counter-item">
                <div class="counter-number" data-target="128">0+</div>
                <div class="counter-label">Projects Completed</div>
            </div>
</h1>
    </div>
</section>
<?php include 'inc/footer.php'; ?>