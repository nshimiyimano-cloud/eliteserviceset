<?php require 'inc/db.php'; require 'inc/functions.php'; $title='Contact Us - EliteServiceSet'; include 'inc/header.php'; ?>
<section>
    <h2>Contact Us</h2>
    <div class="row">
        <div class="col-md-6 mb-5 pr-5">
            <form action="contact_submit.php" method="post" enctype="multipart/form-data">
                <div class="mb-3"><label class="form-label">Name</label><input type="text" name="name"
                        class="form-control" required></div>
                <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email"
                        class="form-control" required></div>
                <div class="mb-3"><label class="form-label">Phone</label><input type="text" name="phone"
                        class="form-control"></div>
                <div class="mb-3"><label class="form-label">Message</label><textarea name="message" rows="5"
                        class="form-control" required></textarea></div>
                <div class="mb-3"><label class="form-label">Attachment (optional)</label><input type="file"
                        name="attachment" class="form-control"></div><button class="btn btn-primary" type="submit">Send
                    Message</button>
            </form>
        </div>
        <div class="col-md-6 mb-5 pl-5">
        <h4 class="text-uppercase text-danger mb-3">Get in Touch</h4>

        <p class="mb-5"><strong>“
        &nbsp;&nbsp;Almost Any Task<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Just Ask&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;”</strong>
</h5>
        <p>

        <i class="bi bi-telephone-fill text-danger"></i> &nbsp;&nbsp;&nbsp;+251 91 194 6817<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +251 90 200 0099<br><br>

          <i class="bi bi-envelope-fill text-danger"></i>&nbsp;&nbsp;&nbsp; both@eliteserviceset.com<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;info@eliteserviceset.com<br><br>


          <i class="bi bi-globe text-danger"></i>&nbsp;&nbsp;&nbsp;&nbsp;www.eliteserviceset.com <br/><br/>


          <i class="bi bi-geo-alt-fill text-danger"></i>&nbsp;&nbsp;&nbsp; Mina Building<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wolo Sefer , Ethio-China Road<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Addis Ababa, Ethiopia<br><br/>
          
        
        </p>

        <h4 class="text-uppercase text-danger mb-5">Follow Us</h4>
        <div class="social-icons">
           
      <a  href="https://wa.me/1234567890" target="_blank" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
      <a  href="https://facebook.com/username" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
      <a  href="https://twitter.com/username" target="_blank" title="Twitter"><i class="bi bi-twitter"></i></a>
      <a  href="https://twitter.com/username" target="_blank" title="Linkedin"><i class="bi bi-linkedin"></i></a>
  
        </div>
      </div>
    </div>
</section>
<section class="mb-5">
    <div class="row g-0 align-items-center">
        <div class="col-md-6"><img src="assets/uploads/contact_block.jpg" class="img-fluid rounded-start" alt="contact"
                style="width:100%;height:100%;object-fit:cover;" /></div>
        <div class="col-md-6 p-4">
            <h3>Visit Our Office</h3>
            <p>We are available by appointment. Use the form to request a consultation and we'll get back to you within
                48 hours.</p>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>