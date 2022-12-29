<?php  include('config/constant.php'); ?>

<?php 

$output = '';
$id = '';
$query ="SELECT * FROM tbl_room WHERE id > ".$_POST['id']." LIMIT 2";
if(mysqli_num_rows($query)>0)
{
    while($row = mysqli_fetch_array($query))
    {
        $id= $row['id'];
        $output .='
        <div class="card mb-4 border-0 shadow">
        <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                <img src="<?php echo SITEURL; ?>images/admin/rooms/<?php echo $row["image_name"]; ?>" class="img-fluid rounded" style="height: 250px; width: 100%;">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
                <h5 class="mb-3"><?php echo $row["title"]; ?></h5>
                <div class="features mb-3">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                        |<?php echo $row["room"]; ?> Rooms |<?php echo $row["bathroom"]; ?> bathorrom| 4 wifi| <?php echo $row["sofa"]; ?> sofa|
                    </span>
                   
                </div>
                <div class="facilities mb-3">
                    <h6 class="mb-1">Facilities</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row["facility"]; ?>
                    </span>
                    
                </div>
                <div class="guests mb-3">
                    <h6 class="mb-1">Guests</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row["adult"]; ?> Adults
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row["child"]; ?> Childrens
                    </span>

                </div>
            </div>
            <div class="col-md-2 text-align-center">
                <h6 class="mb-4 fs-4 text-center">Rs.<?php echo $row["price"]; ?> Per Night</h6>
                <a href="<?php echo SITEURL; ?>booking.php" class="main-btn shadow-none w-100 p-2 rounded-0 text-center">Book Now</a>
            </div>
        </div>
    </div>
        ';
    }
    $output .= '
    <div class="show_more_btn col-md-12 text-center mb-4 ms-5">
    <button type="button" id="'.$id.'"  class="btn main-btn">Load More</button>
</div>
    ';
    echo $output;

}

?>