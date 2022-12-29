<?php  include('frontend-partials/header.php'); ?>

<?php 

			

		$msg="";
				if(isset($_GET['verification']))
				{
					if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_user WHERE code = '{$_GET['verification']}'")) > 0)
					{
						$query = mysqli_query($conn, "UPDATE tbl_user SET code='' WHERE code='{$_GET['verification']}'");

						if($query)
						{
							$msg = "<div class='alert alert-success'>Account Verification Has Been Successful.</div>";
							echo $msg;
						}
					}
					else
					{
						//header("Location: index.php");
					}
				}
        if(isset($_POST['submit']))
				{
					$email = mysqli_real_escape_string($conn, $_POST['email']);
					$password = mysqli_real_escape_string($conn, md5($_POST['password']));
					
					$sql = "SELECT * FROM tbl_user WHERE email='{$email}' AND password='{$password}'";
					$result = mysqli_query($conn, $sql);

					if(mysqli_num_rows($result) == 1)
					{
						$row = mysqli_fetch_assoc($result);

						if(empty($row['code']))
						{

							$_SESSION['SESSION_EMAIL'] = $email;
							
							header('location:'.SITEURL);

						}

						else 
						{
							$msg= "<div class='alert alert-info'>First Verify Your Account and Try Again. </div>";
							echo $msg;
						}
						
					}
					else
						{
							$msg= "<div class='alert alert-danger'>Email or Password Does Not Match.</div>";
							echo $msg;
						}
				}
        ?>

<section class="vh-100">
  <div class="container py-5 h-100 mb-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="<?php echo SITEURL ?>/images/gallery/side-banner.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; widht:100%; height:34rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                    <!-- <img src="/images/logo.png" style="width:12rem;" class="align-self-cente"  alt=""> -->
                  </div>

                  <h5 class="fw-bolder mb-3 pb-3 fs-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example17" name='email' class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" name='password' class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="main-btn  btn-lg btn-block" type="submit" name="submit">Login</button>
                  </div>

                  <p class="mb-0 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="<?php echo SITEURL; ?>sign-up.php"
                      style="color: #393f81;">Register here</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<br>
<br>
<br>
<br>




