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
            <form id="contactForm" class="row g-3 needs-validation" novalidate>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Your Email</label>
                <input type="text" name="email" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Message</label>
                <!-- <input type="text" class="form-control" id="validationCustom01" value="Mark" required> -->
                <textarea name="message" class="form-control" id="validationCustom01" rows="5" required></textarea>
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
<script type="text/javascript">
  (() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        event.preventDefault(); // Prevent the form from submitting the usual way
        event.stopPropagation(); 

        if (form.checkValidity()) 
        {
            let form_data = new FormData($('#contactForm')[0]); // Correct selector
            // let email = $(this).data('email');
            // let subject = $(this).data('subject');
            // let message = $(this).data('message');
            $.ajax({
              url: 'contact_code.php',
              type: 'POST',
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,
              // data: {
              //   email:email,
              //   subject:subject,
              //   message:message
              // },
              success: function(ans) {
                  if (ans === "success") {
                    Swal.fire({
                              title: "Good job!",
                              text: "You clicked the button!",
                              icon: "success",
                              allowOutsideClick: false,
                          }).then((result) => {
                              if (result.isConfirmed) {
                                  window.location.href = 'index.php';
                              }
                          });
                  } else {
                  alert(ans);
                  }
              }
            });
        } 
        else {
            form.classList.add('was-validated');
        }
      }, false);
    });
  })();
</script>
<?php
  // ob_start();

  // use PHPMailer\PHPMailer\PHPMailer;
  // use PHPMailer\PHPMailer\Exception;

  // require 'PHPMailer/src/Exception.php';
  // require 'PHPMailer/src/PHPMailer.php';
  // require 'PHPMailer/src/SMTP.php';
  // if(isset($_POST['submit']))
  // {
  //   $mail = new PHPMailer(true);
  //   $email_to=$_POST['email'];
  //   $subject=$_POST['subject'];
  //   $message=$_POST['message'];
  //   $email_from="vecom2425@gmail.com";

  //   try {

  //         $mail->isSMTP();                                            
  //         $mail->SMTPAuth   = true;

  //         $mail->Host       = 'smtp.gmail.com';                     
  //         $mail->Username   = 'vecom2425@gmail.com';                    
  //         $mail->Password   = 'tksqedesfbhizbll';                               

  //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
  //         $mail->Port       = 587;                                    

  //         $mail->setFrom($email_from, " VECOM : ");
  //         $mail->addAddress($email_to," ");

  //         $mail->isHTML(true);                              
  //         $mail->Subject=$subject;
  //         $mail->Body=$message;

  //         if ($mail->send()) 
  //         {
  //           echo"success";
  //         }
  //         else 
  //         {
  //             echo"Something wrong";
  //         }
  //     }
  //     catch (Exception $e) 
  //     {
  //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  //     }
  // }	
?>

<?php
  include("footer.php");
?>