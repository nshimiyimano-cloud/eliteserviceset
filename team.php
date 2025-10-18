<?php require 'inc/db.php'; require 'inc/functions.php'; $title='Team - EliteServiceSet'; include 'inc/header.php'; $team=$pdo->query("SELECT * FROM team ORDER BY id DESC")->fetchAll(); ?>


<style>
    .team-card img {
      width: 120px;
      height: 120px;
      object-fit: cover;
    }
   
    .team-card{
        margin-left:20px;
    }
  </style>
<section>
    <h2 class="text-center">Meet Our Team</h2>
    <div class="row" style="margin:50px 0 50px 0;"><?php foreach($team as $t): ?>
              <div class="card text-center col-md-3 mb-4 ml-5 p-4 team-card shadow-sm">
    <div class="mx-auto mb-3">
    <img
                data-src="<?php if(!empty($t['photo'])) echo 'assets/uploads/'.$t['photo']; else echo 'assets/uploads/team_mark.jpg'; ?>"
                src="<?php if(!empty($t['photo'])) echo 'assets/uploads/'.$t['photo']; else echo 'assets/uploads/team_mark.jpg'; ?>" loading="lazy" class="rounded-circle border border-3 border-damger" alt="<?=$t['name']?>">
    </div>
    <h5 class="card-title mb-1" style="color:var(--accent-gold);"><?=esc($t['name'])?></h5>
    <h6 class="mb-3 text-danger"><?=esc($t['role'])?></h6>
    <p class="card-text text-light"><?=esc(substr($t['bio'],0,160))?></p>
    
    <h2 class="social-icons mt-3">
      <a href="tel:+1234567890" title="Phone"><i class="bi bi-telephone-fill"></i></a>
      <a href="https://wa.me/1234567890" target="_blank" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
      <a href="https://facebook.com/username" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
      <a href="https://twitter.com/username" target="_blank" title="Twitter"><i class="bi bi-twitter"></i></a>
      <a href="https://twitter.com/username" target="_blank" title="Linkedin"><i class="bi bi-linkedin"></i></a>
    </h2>
  </div>
  <?php endforeach; ?></div>







</section>
<section class="mb-5">
    <div class="row g-0 align-items-center">
        <div class="col-md-6"><img src="assets/uploads/team_block.jpg" class="img-fluid rounded-start" alt="team"
                style="width:100%;height:100%;object-fit:cover;" /></div>
        <div class="col-md-6 p-4">
            <h3>Our Approach</h3>
            <p>Our team blends design thinking with practical project management to deliver results that match your
                lifestyle and budget.</p>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>