<?php include('frontend-partials/header.php') ?>

<?php 

if(!isset($_SESSION['SESSION_EMAIL']) && empty($_SESSION['SESSION_EMAIL']))
{
	header("location:".SITEURL.'login.php');
}
											
?>

    <!-- Booking Form Starts  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 section-title text-center">
                <h6>Booking Form</h6>
                <h3>Room Booking</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form" style="background-color: whitesmoke;">
                    <form action="" method="POST" class="mt-3 p-5">
                        <div class="row">
                            <h4 class="text-center mb-4">Booking Information</h4>
                            <div class="col-md-6 mb-3">
                                <label for="" class="fs-5  mb-2">Check-In</label>
                                <input type="date" name="check_in" id="" class="form-control">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="" class="fs-5  mb-2">Check-Out</label>
                                <input type="date" name="check_out" id="" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="" class="fs-5  mb-2">Adults</label>
                                <input type="number" name="adult" id="" class="form-control" min="0">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="" class="fs-5  mb-2">Childrens</label>
                                <input type="number" name="children" id="" class="form-control" min="0">
                            </div>




                            <div class="col-md-6 mb-3">
                                <label for="" class="fs-5  mb-2">Rooms</label>
                                <select id="room" name="rooms" class="form-select">
                                    <option value="">Select Your Room</option>
                                </select>
                            </div>



                            <div class="col-md-6 mb-3">
                                <label for="" class="fs-5   mb-2">Number Of Rooms</label>
                                <select id="room_number" name="number_of_room" class="form-select">
                                    <option value=""></option>
                                </select>
                            </div>

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




                            <h4 class="text-center mb-4 mt-4">Personal Information</h4>

                            <div class="col-md-12 mb-3">
                                <label for="" class="fs-5  mb-2">Full Name</label>
                                <input type="text" name="f_name" id="" value="<?php if(isset($row)) echo $row['name']; ?>" class="form-control" placeholder="Enter Full Name">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for=" " class="fs-5  mb-2">Email Address</label>
                                <input type="email" name="email" id="" value="<?php if(isset($row)) echo $row['email']; ?>" class="form-control"
                                    placeholder="Enter Email Address">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="" class="fs-5  mb-2">Contact Number</label>
                                <input type="number" name="contact" id="" class="form-control" min="0"
                                    placeholder="Enter Contact Number">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="" class="fs-5  mb-2">Address</label>
                                <input type="text" name="address" id="" class="form-control" placeholder="Enter Address">
                            </div>

                            <div class="col-md-6">
                                <label for="" class="fs-5  mb-2">Message</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea name="message" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea"></textarea>
                            </div>

                            
                            <button type="submit" name="submit" class="main-btn w-90">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.main.js"></script>
    <script type="text/javascript">
     $(document).ready(function()
    {
        function loadData(type,category_id)
        {
            $.ajax
            ({
                    url : "load-cs.php",
                    type : "POST",
                    data : {type : type, id : category_id},
                    success : function(data)
                    {
                        if(type == "roomData")
                        {
                            $("#room_number").html(data);
                        }
                        else
                        {
                            $("#room").append(data);
                        }
                      
                    }

            });
        }
        loadData();

        $("#room").on("change",function()
        {
          //  alert('test');
            var room = $("#room").val();

            loadData("roomData", room);
        })
    });

    </script>


<?php  
	//check whether the submit button is clicked or not
	if(isset($_POST['submit']))
	{
		//get the value from category form
     
        $check_in = date('Y-m-d', strtotime($_POST['check_in']));
        $check_out = date('Y-m-d', strtotime($_POST['check_out']));
        $adult = $_POST['adult'];
        $children = $_POST['children'];
        $rooms = $_POST['rooms'];
        $number_of_room = $_POST['number_of_room'];
        $name = $_POST['f_name'];
		$email = $_POST['email'];
        $contact = $_POST['contact'];
		$address = $_POST['address'];
		$message = $_POST['message'];
        $status="Not Approved";

        //  echo($rooms);
        // die();

     

		
		//create sql query to insert categiry into db
		$sql = "INSERT INTO tbl_booking SET

            checkin='$check_in',
            checkout='$check_out',
            adult=$adult,
            child=$children,
            room='$rooms',
            numberofroom=$number_of_room,
			fullname = '$name',
			email = '$email',
            contact=$contact,
            address='$address',
			message = '$message',
            status = '$status'

		";

		//execute the query and save in db
		$res =  mysqli_query($conn,$sql);

    $selectdatafromtblcategory="SELECT * FROM tbl_category WHERE id =$rooms";

    $query = mysqli_query($conn,$selectdatafromtblcategory);

    // print_r($query);
    // die();

    $single_row=mysqli_fetch_row($query);
    // run geneee

    $remaningroom =$single_row[3]-$number_of_room;

    $updateintblcategory ="UPDATE tbl_category set

    number_of_room='$remaningroom'
    
    WHERE id=$rooms";

    $updatecategory = mysqli_query($conn,$updateintblcategory);

    // print_r($updatecategory);
    // die();





      
		//check whether the query executed or not and data added or not
		if($res == true)
		
		{
            $_SESSION['status'] = "Booking Successfull";
            $_SESSION['status_code'] = "success";
		}
		else
		{
			$_SESSION['status'] = "Booking Failed";
      $_SESSION['status_code'] = "error";
			

	}
}
	?>




    <!-- Booking Form Ends  -->

    <?php include('frontend-partials/footer.php') ?>
    
    <script src="js/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 

if(isset($_SESSION['status']) && $_SESSION['status'] != '')
{
	?>
	<script>
					swal({
							title: "<?php  echo $_SESSION['status'];  ?>",
							//text: "You clicked the button!",
							icon: "<?php  echo $_SESSION['status_code'];  ?>",
							button: "Ok",	
						});
	</script>
	<?php
	unset($_SESSION['status']);
}

?>



























   