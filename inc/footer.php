  </div>
</main>
<!-- ======= Footer with Decorative Waves ======= -->

<style>
  
  footer {
    background: rgb(200, 161, 101) !important;
  }
  
  .footer-link {
    color: #333;
    text-decoration: none;
    display: block;
    margin-bottom: 6px;
    transition: all 0.3s ease;
  }
  
  .footer-link:hover {
    color:rgb(128, 102, 64);
    padding-left: 5px;
  }
  
  footer h5 {
    font-weight: 600;
    letter-spacing: 1px;
  }
  
  footer hr {
    border-color: rgba(255, 255, 255, 0.2);
  }

  
.social-icons a{
    margin: 0 8px;
    color:rgb(233, 173, 83);
    font-size: 1.25rem;
    transition: color 0.3s;
    font-weight:bold;
  }
  .social-icons a i:hover {
    color: #ccc;
  }


</style>
<section class="footer-waves">
  <svg viewBox="0 0 1440 320" class="footer-wave-svg">
    <path fill="#C8A165" fill-opacity="1"
      d="M0,192L48,208C96,224,192,256,288,261.3C384,267,480,245,576,213.3C672,181,768,139,864,128C960,117,1056,139,1152,154.7C1248,171,1344,181,1392,186.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
  </svg>
</section>

<footer class="text-white py-4">
<div class="container">
    <div class="row text-center text-md-start">
      
      <!-- Logo & About -->
      <div class="col-md-4 mb-4">
        <img src="assets/uploads/logo.png" alt="EliteServiceSet Logo" class="mb-3" style="max-width:160px;">
        <p class="small text-muted">
          EliteServiceSet specializes in commercial and residential renovation, creating elegant interiors that define luxury and comfort.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase text-warning mb-3">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="footer-link">« Home</a></li>
          <li><a href="about.php" class="footer-link">« About Us</a></li>
          <li><a href="services.php" class="footer-link">« Services</a></li>
          <li><a href="contact.php" class="footer-link">« Contact</a></li>
          <li><a href="admin/login.php" class="footer-link">« Admin Login</a></li>
        </ul>
      </div>

      <!-- Contact & Social -->
      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase text-warning mb-3">Get in Touch</h5>
        <p class="small">
          <i class="bi bi-geo-alt-fill text-warning"></i> Kigali, Rwanda<br>
          <i class="bi bi-telephone-fill text-warning"></i> +250 789 000 111<br>
          <i class="bi bi-envelope-fill text-warning"></i> info@eliteserviceset.com
        </p>
        <div class="social-icons">
           
      <a  href="https://wa.me/1234567890" target="_blank" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
      <a  href="https://facebook.com/username" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
      <a  href="https://twitter.com/username" target="_blank" title="Twitter"><i class="bi bi-twitter"></i></a>
      <a  href="https://twitter.com/username" target="_blank" title="Linkedin"><i class="bi bi-linkedin"></i></a>
  
        </div>
      </div>

    </div>

    <hr class="border-light">
    <div class="text-center text-dark">
      &copy; <?= date('Y') ?> <strong>EliteServiceSet</strong>. All rights reserved.
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
  var grid = document.querySelector('.projects-grid');
  if(grid && typeof Masonry !== 'undefined'){ new Masonry(grid, { itemSelector: '.project-card', columnWidth: '.project-card', percentPosition: true, gutter: 16 }); }
  if('loading' in HTMLImageElement.prototype){ /* native lazy */ } else {
    var lazyImgs = document.querySelectorAll('img[data-src]');
    if('IntersectionObserver' in window){
      let io = new IntersectionObserver((entries, obs) => {
        entries.forEach(e=>{ if(e.isIntersecting){ let img=e.target; img.src=img.dataset.src; img.removeAttribute('data-src'); obs.unobserve(img); } });
      });
      lazyImgs.forEach(i=>io.observe(i));
    } else { lazyImgs.forEach(img=>{ img.src=img.dataset.src; img.removeAttribute('data-src'); }); }
  }
});
</script>

<script src="assets/js/theme.js"></script>
</body>
</html>
