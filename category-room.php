<?php include('frontend-partials/header.php');  ?> 

<div class="container">
        <div class="row">
            <div class="col-sm-12 section-title mt-5 text-center">
                <h6>Best Rooms We Offer</h6>
                <h3>Our Rooms</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 px-4">
                
                    
                        <?php 
                        if (isset($_GET['category_id']))

                        {
                           // category_id is set and gee the id
                           $category_id=$_GET['category_id'];
                   
                           // get the catevory title based on category id 
                           $sql="SELECT * FROM tbl_category WHERE id=$category_id";
                   
                           // execute the query 
                           $res=mysqli_query($conn,$sql);
                   
                           // get the value from database 
                           $row=mysqli_fetch_assoc($res);
                   
                           // get title 
                           
                       }
                       else
                       {
                           // category not passed redirect to home page
                           header('location:'.SITEURL);
                       }

                        ?>


                        
                            <?php 

                                        $sql2="SELECT * FROM tbl_category WHERE id=$category_id";

                                        // execute the query  

                                        $res2=mysqli_query($conn,$sql2);

                                        // count the rows 
                                        $count2=mysqli_num_rows($res2);

                                        // check whether food is available or not 
                                        if ($count2>0)
                                        {
                                            // food is available 
                                            $row2=mysqli_fetch_assoc($res2);
                                          //  print_r($row2); die();
                                            // while ()
                                            // {
                                                $id=$row2['id'];
                                                $title=$row2['name'];
                                                $image_name=$row2['image'];
                                                $room=$row2['number_of_room'];
                                                $bathroom=$row2['bathroom'];
                                                $sofa=$row2['sofa'];
                                                $adult=$row2['adult'];
                                                $children=$row2['child'];
                                                $description=$row2['description'];
                                                $price=$row2['price'];

                                                
                                ?>
                                <div class="card mb-4 border-0 shadow">
                                <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="<?php echo SITEURL; ?>images/admin/category/<?php echo $image_name; ?>" class="img-fluid rounded" style="height: 350px; width: 100%; object-fit:cover">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3"><?php  echo $title; ?></h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                              
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $bathroom; ?> Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $sofa; ?> Sofa
                                </span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap text-align-left">
                                <?php echo $description; ?>
                                </span>
                            </div>
                           
                            <div class="guests mb-3">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $adult; ?> Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    <?php echo $children; ?> Childrens
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
                            <a href="<?php echo SITEURL; ?>booking.php?category_id=<?php echo $category_id; ?>" class="main-btn shadow-none w-100 p-2 rounded-0 text-center">Book Now</a>
                        </div>
                    </div>
                </div>
                <?php 
                                             }
                                           // }
                                            
                                            else 
                                            {
                                                ?>

                                                <div class="container">
                                                     <div class="row">
                                                        <div class="col-sm-6 p-5 justify-content-center align-items-center">
                                                            <span class="fw-5 p-5 fs-2 ">Rooms Not Found.</span>
        
                                                            </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                                ?>
            </div>
                                        

                                                
                                            
                                        
                                        
                                        
                                        
<?php include('frontend-partials/footer.php');  ?> 