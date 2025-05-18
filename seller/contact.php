<?php
  include("header.php");
  include("menubar.php");
  include("connection.php");
?>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row mb-3">
            <h1 class="fs-1 fw-bold">Contact Us</h1>
            <hr>
        </div>
        <div class="row">
          <div class="col-6">
            <form class="row g-3 needs-validation" novalidate>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Your Email</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Subject</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Message</label>
                <!-- <input type="text" class="form-control" id="validationCustom01" value="Mark" required> -->
                <textarea name="" class="form-control" id="validationCustom01" rows="5" required></textarea>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-12">
                <input type="submit" value="Send" class="btn btn-warning">
              </div>
            </form>
          </div>
          <div class="col-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d309.4416569005745!2d71.22058472742597!3d21.59852171133898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sin!4v1726695696442!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
    </div>
</div>
<?php
  include("footer.php");
?>