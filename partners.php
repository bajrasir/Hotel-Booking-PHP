<section id="blog" class="blog_wrapper pb-0">
<div class="col-sm-12 section-title text-center m-0">
                    <h6>What Can We Do For You</h6>
                    <h3>Our Partners</h3>
                </div>
        <div class="our-partner-slider mt-5"><div class="row">
                
            </div>
            <div class="container swiper our-partner">
                <div class="swiper-wrapper">
                        <?php 
                                $sql="SELECT * FROM tbl_partners";

                                $res2=mysqli_query($conn,$sql);

                                $count=mysqli_num_rows($res2);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res2))
                                    {
                                            $id=$row['id'];
                                            $title=$row['name'];
                                            $image_name=$row['image'];
                            
                                        ?>
                    <div class="swiper-slide">
                        <img src="<?php SITEURL; ?>images/admin/partners/<?php echo $image_name; ?>" alt="">
                    </div>
                    <?php 
            }
        }

        ?>
                </div>
            </div>
        </div>


    </section>
