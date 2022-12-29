<?php include('frontend-partials/header.php') ?>



    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5 section-title text-center">
                <h6>Best Rooms We Offer</h6>
                <h3>Our Rooms</h3>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h5 class="mt-2 text-center">Filters</h5>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-2 rounded mb-3">
                                <h6 class="mb-3">Check Availability</h6>
                                <label class="form-label">Check-In</label>
                                <input type="date" name="" id="" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-Out</label>
                                <input type="date" name="" id="" class="form-control shadow-none">
                            </div>

                            <div class="border bg-light p-2 rounded mb-3">
                                <h6 class="mb-3" style="font-size: 18px;">Guests</h6>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label for="" class="form-label">Adults</label>
                                        <input type="number" name="" id="" class="form-control shadow-none">
                                    </div>
                                    <div>
                                        <label for="" class="form-label">Childrens</label>
                                        <input type="number" name="" id="" class="form-control shadow-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                </nav>
            </div> -->









            <div class="load-container col-lg-12 col-md-12 px-4">

                    <?php 
                      $sql="SELECT * FROM tbl_category where active='yes'";
                      $res=mysqli_query($conn,$sql);
              
                      $count=mysqli_num_rows($res);
              
                      if($count>0)
                      {
                          while($row=mysqli_fetch_assoc($res))
                          {
                                  $id=$row['id'];
                                  $name=$row['name'];
                                  $image_name=$row['image'];
                                  $room=$row['number_of_room'];
                                  $bathroom=$row['bathroom'];
                                  $sofa=$row['sofa'];
                                  $adult=$row['adult'];
                                  $child=$row['child'];
                                  $description=$row['description'];
                                  $price=$row['price'];
              
                              ?>
                               
                <div class="load-box card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="<?php echo SITEURL; ?>images/admin/category/<?php echo $image_name; ?>" class="img-fluid rounded" style="height: 350px; width: 100%;">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3"><?php echo $name; ?></h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                 |<?php echo $bathroom; ?> bathorooms  | 4 wifi| <?php echo $sofa; ?> sofa|
                                </span>
                               
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $description; ?>
                                </span>
                                
                            </div>
                            <div class="guests mb-3">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $adult; ?> Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $child; ?> Childrens
                                </span>
                            </div>
                            <div class="facilities mb-3">
                            <h5 class="mb-3">Number Of Rooms Available</h5>
                                <span class=" bg-light text-dark text-align-right fs-4 fw-bolder">
                                <?php if($room == 0)
                                {
                                    echo "No Rooms Available";
                                } 
                                else 
                                {
                                    echo $room; }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2 text-align-center">
                            <h6 class="mb-4 fs-4 text-center">Rs.<?php echo $price; ?> Per Night</h6>
                            <a href="<?php echo SITEURL; ?>booking.php?category_id=<?php echo $id; ?>" class="main-btn shadow-none w-100 p-2 rounded-0 text-center">Book Now</a>
                        </div>

                    </div>
                </div>
                <?php  
                          }}
                ?>
            </div>
        </div>

        <div class="col-md-12 text-center mb-4 ms-5">
            <button type="button"  class="btn main-btn loadMore">Load More</button>
        </div>
    </div>



    <?php include('frontend-partials/footer.php') ?>

    <script src="js/jquery-latest.min.js"></script>
<script>
	$(".load-box").slice(0,3).show(); //showing 3 div

    $(".loadMore").on("click",function(){
		$(".load-box:hidden").slice(0, 3).show(); //showing 3 hidden div on click

		if($(".load-box:hidden").length ==0)
		{
			$(".loadMore").fadeOut(); //this will hide
			//button when length is 0
		}
	})

	

</script>

    