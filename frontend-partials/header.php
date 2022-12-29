<?php  include('config/constant.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation</title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap CDN link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Swiper CDN Link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.min.js" integrity="sha512-naEQG74IcOLQ6K/B1PmhIcZ4i3YE2FXs2zm603E1Q3shbron+PmYLg44/q+xAymD/RvskZ2H8l1Qa7I5qELlrg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Custom File CSS link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive-style.css">
    
    

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">


    <!-- Navbar section Starts  -->
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="images/logo.png" class="img-fluid" alt="Logo"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <i class="fas fa-stream navbar-toggler-icon"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav menu-navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="<?php echo SITEURL;  ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo SITEURL;  ?>rooms.php">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="<?php echo SITEURL;  ?>gallery.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo SITEURL;  ?>maps.php">Location</a>
                        </li>
                        <?php 

					

							

							if(isset($_SESSION['SESSION_EMAIL']))
							{
								
								$query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '{$_SESSION['SESSION_EMAIL']}'");

								if(mysqli_num_rows($query) > 0)
								{
									$row = mysqli_fetch_assoc($query);
									// echo "Welcome" . $row['name'];
								}
								//header("location:".SITEURL);
								//die(); 
							}
								
								
							?>
								<li class="nav-item"><a class="nav-link" style="text-decoration:none; color:black;"><?php if(isset($row)) echo $row['name']; ?></a></li>

                                <?php 
									if(isset($_SESSION['SESSION_EMAIL']) && !empty($_SESSION['SESSION_EMAIL'])){
									?>
                                <li class="nav-item">
                            <a class="nav-link" href="<?php echo SITEURL;  ?>logout.php">Log Out</a>
                        </li>
                        <?php } ?>
                                
								
							
                                <?php 
									if(!isset($_SESSION['SESSION_EMAIL']) && empty($_SESSION['SESSION_EMAIL'])){
									?>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-end" href="<?php echo SITEURL; ?>login.php">Log In</a>
                        </li>

                        <?php } ?>
                                                <li class="nav-item mt-3 mt-lg-0">
                            <a class="main-btn text-decoration-none" href="<?php echo SITEURL; ?>rooms.php">Book Now</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navbar section Ends  -->