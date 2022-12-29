<section id="rooms" class="rooms-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 section-title mt-5 text-center m-0">
                    <h6>What Can We Do For You</h6>
                    <h3>Our Favourite Rooms</h3>
                </div>
            </div>

            <div class="row m-0">

            <?php 
                      $sql="SELECT * FROM tbl_category where active='yes' LIMIT 3";

                      $res=mysqli_query($conn,$sql);
              
                      $count=mysqli_num_rows($res);
              
                      if($count>0)
                      {
                          while($row=mysqli_fetch_assoc($res))
                          {
                                  $id=$row['id'];
                                  $title=$row['name'];
                                  $image_name=$row['image'];
                                  $description=$row['description'];
                                  $price=$row['price'];
              
                              ?>
               <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-items">
                    <?php 
                        
                        if($image_name=="")
                        {
                            echo "NO IMAGE";
                        }
                        
                        else 
                        {
                            ?>
                        <img src="<?php SITEURL; ?>images/admin/category/<?php echo $image_name; ?>" class="container-fluid" style="height:600px; width:480px;" alt="">
                        <?php 
                        }
                        ?>
                        
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h5 class="text-white mb-lg-0 text-decoration-underline"><?php  echo $title; ?></h5><br>
                                <p class="text-white"><?php echo $description; ?></p>
                                <p class="text-white fw-bold mt-lg-4">Rs.<?php echo $price;  ?> per night</p>
                                <a href="<?php echo SITEURL; ?>category-room.php?category_id=<?php echo $id; ?>" class="main-btn border-white text-white mt-lg-5">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                          }
                        }
                        ?>
    
            </div>
                    </section>

            