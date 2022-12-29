<?php  include('frontend-partials/header.php'); ?>

<?php 

//Import PHPMailer classes into the global namespace
		//These must be at the top of your script, not inside a function
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

		//Load Composer's autoloader
		require 'vendor/autoload.php';


$msg="";

  if(isset($_POST['submit']))
  {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
    $confirm_password =mysqli_real_escape_string($conn,md5($_POST['confirm-password']));
    $code = mysqli_real_escape_string($conn,md5(rand()));

      if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_user WHERE email='{email}'"))>0)
      {
        $msg = "<div class='alert alert-danger'>{$email} - This email is already taken.</div>";
								
      }
      else 
      {  
          if($password == $confirm_password)
            {
              $sql = "INSERT INTO tbl_user (name, email, password, code) VALUES ('{$name}', '{$email}', '{$password}', '{$code}')";
              $result = mysqli_query($conn, $sql);


                if($result)
                {
                  echo "<div style='display:none;'>";
                  //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'testkripapharmacy@gmail.com';                     //SMTP username
    $mail->Password   = 'qzldglbcgoydqmwx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($email);     //Add a recipient
    

  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'no-reply';
    $mail->Body    = 'Here is the verification link <b><a href="http://localhost/hotel/login.php?verification='.$code.'">http://localhost/hotel/login.php?verification='.$code.'</a></b>';
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
echo "</div>";
                  $msg = "<div class='alert alert-info'>We've Send a verification link on your email</div></div>";
                }
                else
                {
                  $msg= "<div class='alert alert-danger'>Oops Something Went Wrong</div>";
                }
            }
            else
                 {
                     $msg = "<div class='alert alert-danger'>Password and Confirm Password does not match.</div>";
                  }
      }
    

  }



?>

<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="post">

              <?php  echo $msg; ?>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" value="<?php if(isset($_POST['submit'])){ echo $name;} ?>"/>
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" value="<?php if(isset($_POST['submit'])){ echo $email;} ?>"/>
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password"/>
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>
                
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="confirm-password" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit"
                    class="main-btn  text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="<?php echo SITEURL; ?>login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>