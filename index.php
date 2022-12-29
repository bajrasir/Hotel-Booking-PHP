
<?php include('frontend-partials/header.php');  ?> 



    <!-- Banner section starts  -->
    <section id="home" class="banner-wrapper p-0">
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
    <?php 
          $sql_banner="SELECT * FROM tbl_banner where active='yes'";
    

          $res_banner=mysqli_query($conn,$sql_banner);

          $count_banner=mysqli_num_rows($res_banner);

  
          if($count_banner>0)
          {
              while($row_banner=mysqli_fetch_assoc($res_banner))
              {
                $id=$row_banner['id'];
                $title=$row_banner['title'];
                $image_name=$row_banner['image'];
                $description=$row_banner['description'];
              

               if($image_name=="")
                  {
                         echo "NO IMAGE";
                    }
      
                else 
                    {
                        ?>
                         <div class="swiper-slide" style="background-image: url(<?php echo SITEURL; ?>images/admin/banner/<?php echo $image_name; ?>);">  
                         <div class="slide-caption text-center">
                            <div>
                            <h1><?php echo $title;  ?></h1>
                                            <p><?php echo $description;  ?></p>
                            </div>
                        </div>
            </div>
                        <?php
                    }
              }
        }
        ?>
           

           
    </div>
    <div class="swiper-pagination"></div>   
</div>
<!-- Banner Section Ends -->
        <div class="container booking-area">
            <form class="row" action="<?php echo SITEURL; ?>search-room.php" method="POST">
                <div class="col-lg mb-3 mb-lg-0">
                    <input type="date" class="form-control" placeholder="Date">
                </div>

                <div class="col-lg mb-3 mb-lg-0">
                    <input type="date" class="form-control" placeholder="Date">
                </div>

                <div class="col-lg mb-3 mb-lg-0">
                    <select class="form-select" name="adult">
                        <option selected>Adults</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>

                <div class="col-lg mb-3 mb-lg-0">
                    <select class="form-select" name="child">
                        <option selected>Childrens</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>

                <div class="col-lg mb-3 mb-lg-0">
                    <button type="submit" class="main-btn rounded-2 px-lg-3">Check Availability</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Banner Section Ends  -->

    <!-- About Section Starts  -->
    <section id="about" class="about-wrapper">
        <div class="container">
            <div class="row flex-lg-row flex-column-reverse">
                <div class="col-lg-6 text-center text-lg-start">
                    <h3>Welcome to <span>Hotel <br class="d-none d-lg-block"> the haven</span> of your weekend</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt rem, unde animi quas
                        voluptatibus non mollitia accusamus neque laudantium at quisquam perferendis, excepturi eligendi
                        maxime. Voluptatem atque harum minus!</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo ipsum asperiores amet voluptatem.
                        Et, est!</p>
                    <a href="#" class="main-btn mt-4">Explore</a>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0 ps-lg-4 text-center">
                    <img src="images/about-img.svg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- About Section Ends  -->

    <!-- Rooms Section Starts  -->
    <?php include('room.php'); ?>

    <!-- Rooms Section Ends  -->

    <!-- Services Section Starts  -->

    <section id="services" class="services_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>We Are Here For You</h6>
                    <h3>Our Awesome Services</h3>
                </div>
            </div>
            <div class="row align-items-center service-item-wrap">
                <div class="col-lg-7 p-lg-0">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="spa" role="tabpanel">
                            <img src="./images/services/service1.webp">

                        </div>

                        <div class="tab-pane fade" id="restaurant" role="tabpanel">
                            <img src="./images/services/service2.webp">
                        </div>

                        <div class="tab-pane fade" id="swimming" role="tabpanel">
                            <img src="./images/services/service3.webp">
                        </div>

                        <div class="tab-pane fade" id="conference" role="tabpanel">
                            <img src="./images/services/service6.webp">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 position-relative">
                    <div class="service-menu-area">
                        <ul class="nav">
                            <li>
                                <a data-bs-toggle="tab" href="#spa" class="active">
                                    <span class="service-icon">
                                        <img src="./images/services/service-icon1.webp" alt="">
                                    </span>
                                    <h5>Spa, Beauty & Health</h5>
                                    <p><span>Spa and Beauty </span>Lorem ipsum dolor sit amet consectetur adipisicing
                                    </p>
                                </a>
                            </li>

                            <li>
                                <a data-bs-toggle="tab" href="#restaurant">
                                    <span class="service-icon">
                                        <img src="./images/services/service-icon2.webp" alt="">
                                    </span>
                                    <h5>Restaurant</h5>
                                    <p><span>Restaurant </span>Lorem ipsum dolor sit amet consectetur adipisicing</p>
                                </a>
                            </li>

                            <li>
                                <a data-bs-toggle="tab" href="#swimming">
                                    <span class="service-icon">
                                        <img src="./images/services/service-icon3.webp" alt="">
                                    </span>
                                    <h5>Swimming Pool</h5>
                                    <p><span>Swimming </span>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                </a>
                            </li>

                            <li>
                                <a data-bs-toggle="tab" href="#conference">
                                    <span class="service-icon">
                                        <img src="./images/services/service-icon1.webp" alt="">
                                    </span>
                                    <h5>Conference Hall</h5>
                                    <p><span>Conference </span>Lorem ipsum dolor sit amet consectetur adipisicing elit
                                        adipisicing elit adipisicing elit.</p>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="counter mt-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                    <h1>
                        <span id="count1"></span>+
                    </h1>
                    <p>Happy Clients </p>
                </div>


                <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                    <h1>
                        <span id="count2"></span>+
                    </h1>
                    <p>New Friendships</p>
                </div>

                <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                    <h1>
                        <span id="count3"></span>+
                    </h1>
                    <p>Five Star Ratings</p>
                </div>

                <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                    <h1>
                        <span id="count4"></span>+
                    </h1>
                    <p>Served Breakfast</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Service section Ends  -->

    <!-- Team Section Starts  -->
    <section id="team" class="team_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>What Can We Do For You</h6>
                    <h3>Our Special Staffs</h3>
                </div>
            </div>
            <div class="row">
            
                <?php 
                  $sql_staff="SELECT * FROM tbl_staff where active='yes'";
            

                  $res_staff=mysqli_query($conn,$sql_staff);

                  
                  $count_staff=mysqli_num_rows($res_staff);

            
                  if($count_staff>0)
                  {
                      while($row_staff=mysqli_fetch_assoc($res_staff))
                      {
                              $id=$row_staff['id'];
                              $name=$row_staff['name'];
                              $post=$row_staff['post'];
                              $image_name=$row_staff['image'];
                              $facebook=$row_staff['facebook'];
                              $linkedin=$row_staff['linkedin'];
                            
          
                             if($image_name=="")
                                {
                                       echo "NO IMAGE";
                                  }
                    
                              else 
                                  {
                                     ?>
                                     
                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="card p-0 rounded-3">
                        <img src="<?php echo SITEURL; ?>images/admin/staff/<?php echo $image_name; ?>" class="img-fluid rounded-3" alt="">
                        <div class="team-info">
                            <h5><?php echo $name; ?></h5>
                            <p><?php echo $post; ?></p>
                            <ul class="social-network">
                                <!-- <li><a href="#"><i class="fab fa-facebook-f"></i></a></li> -->
                                <li><a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="<?php echo $linkedin;  ?>"><i class="fab fa-linkedin"></i></a></li>
                                <!-- <li><a href="#"><i class="fab fa-instagram"></i></a></li> -->
                            </ul>
                        </div>
                        </div>
                        </div>
                       
                        <?php 
                                  }
                                }
                            }
                        ?>
                         </div>
        </div>

    </section>

    <!-- Team Section Ends  -->

    <!-- Gallery Section Starts  -->
    <section id="gallery" class="gallery_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center">
                    <h6>Best Pictures Of Our Hotel</h6>
                    <h3>Our Gallery</h3>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img src="./images/gallery/1.webp" alt="" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>

                <div class="col-lg-3 col-md-6 gallery-item">
                    <img src="./images/gallery/2.webp" alt="" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>

                <div class="col-lg-3 col-md-6 gallery-item">
                    <img src="./images/gallery/3.webp" alt="" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>

                <div class="col-lg-3 col-md-6 gallery-item">
                    <img src="./images/gallery/4.webp" alt="" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>

                <div class="col-md-6 gallery-item">
                    <img src="./images/gallery/5.webp" alt="" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>

                <div class="col-md-6 gallery-item">
                    <img src="./images/gallery/6.webp" alt="" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>

            </div>
        </div>
    </section>
    <!-- Gallery Section Ends  -->

    <!-- Customer Testimonial Section Starts -->


      <!-- Customer Testimonial Section Ends -->
      

     <!-- Blog Section Starts -->

   <?php  include('partners.php') ?>

    <!-- Blog section Ends  -->



    <?php include('frontend-partials/footer.php');  ?> 
    