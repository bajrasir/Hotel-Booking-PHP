<?php  include('frontend-partials/header.php'); ?>

                <?php 
					$adult=mysqli_real_escape_string($conn,$_POST['adult']);
                    $child=mysqli_real_escape_string($conn,$_POST['child']);
                
                    
			    ?>

<div class="col-lg-12 col-md-12 px-4 mt-5">

<?php 
  $sql="SELECT * FROM tbl_category where adult>=$adult AND child>=$child";

  $res=mysqli_query($conn,$sql);

  $count=mysqli_num_rows($res);

  if($count>0)
  {
      while($row=mysqli_fetch_assoc($res))
      {
              $id=$row['id'];
              $title=$row['name'];
              $image_name=$row['image'];
              $room=$row['number_of_room'];
              $bathroom=$row['bathroom'];
              $sofa=$row['sofa'];
              $facility=$row['description'];
              $adult=$row['adult'];
              $child=$row['child'];
              $price=$row['price'];

          ?>
           
<div class="card mb-4 border-0 shadow">
<div class="row g-0 p-3 align-items-center">
    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">

        <img src="<?php echo SITEURL; ?>images/admin/category/<?php echo $image_name; ?>" class="img-fluid rounded" style="height: 350px; width: 100%; object-fit:cover">
    </div>
    <div class="col-md-5 px-lg-3 px-md-3 px-0">
        <h5 class="mb-3"><?php echo $title; ?></h5>
        <div class="features mb-3">
            <h6 class="mb-1">Features</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
                |<?php echo $room; ?> Rooms |<?php echo $bathroom; ?> bathorrom| 4 wifi| <?php echo $room; ?> sofa|
            </span>
           
        </div>
        <div class="facilities mb-3">
            <h6 class="mb-1">Facilities</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
            <?php echo $facility; ?>
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
        <a href="<?php echo SITEURL; ?>booking.php" class="main-btn shadow-none w-100 p-2 rounded-0 text-center">Book Now</a>
    </div>

</div>
</div>
<?php  
      }}
?>
</div>
