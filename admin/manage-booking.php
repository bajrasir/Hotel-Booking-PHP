<?php
include('partials/header.php');
?>

<?php ob_start(); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Bookings</h1>
		<br>
		<br>
			<?php
			if (isset($_SESSION['add']))
			 {
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			if(isset($_SESSION['delete']))
			{
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);
			}
			if (isset($_SESSION['upload']))
			 {
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			if (isset($_SESSION['unauthorize']))
			 {
				echo $_SESSION['unauthorize'];
				unset($_SESSION['unauthorize']);
			}
			if (isset($_SESSION['update']))
			 {
				echo $_SESSION['update'];
				unset($_SESSION['update']);
			}

				if (isset($_SESSION['no-food-found']))
			 {
				echo $_SESSION['no-food-found'];
				unset($_SESSION['no-food-found']);
			}
			



			?>
			<br>
			<!--Button to Add Admin-->
			
			<br>
			<br>
			<br>
			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Adult</th>
                    <th>Children</th>
					<th>Room</th>
                    <th>No Of Room</th>
					<th>Full Name</th>
					<th>Email</th>
					<th>Contact</th>
                    <th>Message</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
						<?php 
						// create a sql query to get all the data from the database
						$sql="SELECT * FROM tbl_booking";

						// execute the query

						$res=mysqli_query($conn,$sql);

						// count the rows to check whether we have food or not

						$count=mysqli_num_rows($res);
						// create serial number and set default value 1
						$sn=1;

						if ($count>0)
						 {
							// we have food in the database
							// get the food from database and display

							while ($row=mysqli_fetch_assoc($res)) 
							{
								// get the value from individual columns

								$id=$row['id'];
								$check_in=$row['checkin'];
                                $check_out=$row['checkout'];
                                $adult=$row['adult'];
                                $child=$row['child'];
                                $room=$row['room'];
								$number_of_room=$row['numberofroom'];
                                $fullname=$row['fullname'];
                                $email=$row['email'];
                                $contact=$row['contact'];
                                $message=$row['message'];
								$status=$row['status'];
		
								?>

								<tr>
									<td><?php echo $sn++;?>. </td>
									<td><?php echo $check_in; ?></td>
									<td><?php echo $check_out; ?></td>
                                    <td><?php echo $adult; ?></td>
                                    <td><?php echo $child; ?></td>
									<td><?php echo $room; ?></td>
                                    <td><?php echo $number_of_room; ?></td>
                                    <td><?php echo $fullname; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $contact; ?></td>
									<td><?php echo $message; ?></td>
									<td>
									<?php  
									if ($status=="Not Approved")
									 {
									 	echo "<label style='color: #0099cc;'><b>$status</b></label>";	
									}
									elseif ($status=="Approved") 
									{
										echo "<lable style='color: #29a329;'><b>$status</b></label>";
									}
									elseif ($status=="Cancelled") 
									{
										echo "<lable style='color: #e60000;'><b>$status</b></label>";
									}
									
									?>

							</td>

									<td>
									<a href="<?php echo SITEURL; ?>admin/update-booking.php?id=<?php echo $id; ?>" class="btn-secondary">Update Booking</a> 
									</td>
								</tr>

								<?php

							}


						}

						else
						{
							// we do no thave food in the databse
							echo "<tr><td colspan='7' class='error'> Room Not Added Yet </td></tr>";
						}


						?>	
				
			</table>
	</div>
</div>

<!-- <script>
	const btn = document.getElementById('approveBtn');

btn.addEventListener('click', function onClick() {
  btn.style.backgroundColor = 'salmon';
  btn.style.color = 'white';
  btn.innerText ="Approved";


});
</script> -->



	



<?php ob_flush(); ?>
