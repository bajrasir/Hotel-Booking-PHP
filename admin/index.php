<?php  include('partials/header.php'); ?>

<h1 style='color: Black; margin-top:3rem'><center>Dashboard Summary</center></h1>
			
				<div class="row" style="margin-top:4rem;">
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="card border-light mb-3" style="max-width: 18rem; height:10rem;">
						<?php  

				$sql="Select * FROM tbl_admin";
				// execute the query 
				$res=mysqli_query($conn,$sql);

				$count=mysqli_num_rows($res);

				 ?>
  							<div class="card-header text-center h5 fw-bold">Admin</div>
  							<div class="card-body">
    							<h5 class="card-title text-center fs-2 fw-bolder p-4"><?php echo $count; ?></h5>
  							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="card border-light mb-3" style="max-width: 18rem; height:10rem;">
						<?php  

				$sql="Select * FROM tbl_category";
				// execute the query 
				$res=mysqli_query($conn,$sql);

				$count2=mysqli_num_rows($res);

				 ?>
  							<div class="card-header text-center h5 fw-bold">Categories</div>
  							<div class="card-body">
    							<h5 class="card-title text-center fs-2 fw-bolder p-4"> <?php echo $count2;?></h5>
  							</div> 
						</div>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="card border-light mb-3" style="max-width: 18rem; height:10rem;">
						<?php  

				$sql="Select * FROM tbl_room";
				// execute the query 
				$res=mysqli_query($conn,$sql);

				$count3=mysqli_num_rows($res);

				 ?>
  							<div class="card-header text-center h5 fw-bold">Rooms</div>
  							<div class="card-body">
    							<h5 class="card-title text-center fs-2 fw-bolder p-4"><?php echo $count3; ?></h5>
  							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="card border-light mb-3" style="max-width: 18rem; height:10rem;">
						<?php  

				$sql="Select * FROM tbl_partners";
				// execute the query 
				$res=mysqli_query($conn,$sql);

				$count4=mysqli_num_rows($res);

				 ?>
  							<div class="card-header text-center h5 fw-bold">Partners</div>
  							<div class="card-body">
    							<h5 class="card-title text-center fs-2 fw-bolder p-4"><?php echo $count4;  ?></h5>
  							</div>
						</div>
					</div>

					<div class="container"> 
                        
						<h1 style='color: Black; margin-top:3rem'><center>Latest Approved Bookings</center></h1>
							
						
					<table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Adult</th>
			<th>Child</th>
			<th>Number of Rooms</th>
			<th>Message</th>
			<th>Status</th>
		  </tr>
		</thead>
		<tbody>
		<?php  
	
	//qury to get all categiry from db
	$sql = "SELECT * FROM tbl_booking ORDER BY id DESC LIMIT 3";
	
	//execute the query
	$res =  mysqli_query($conn,$sql);
	
	//count rows
	$count = mysqli_num_rows($res);
	
	//create serial number variable and assign value as 1
	$sn = 1;
	
	//check whether we have data in db or not
	if($count>0)
	{
		//we have data in db
		//get the data and display
		while ($row = mysqli_fetch_assoc($res)) 
		{
			$id = $row['id'];
			$fullname = $row['fullname'];
			$adult=$row['adult'];
			$child=$row['child'];
			$numberofroom=$row['numberofroom'];
			$email = $row['email'];
			$message = $row['message'];
			$status = $row['status'];
		
			?>
		  <tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $fullname; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $adult; ?></td>
			<td><?php echo $child; ?></td>
			<td><?php echo $numberofroom; ?></td>
			<td><?php echo $message; ?></td>
			<td><?php  
									if ($status=="Not Approved")
									 {
									 	echo "<label style='color: #0099cc;'>$status</label>";	
									}
									elseif ($status=="Approved") 
									{
										echo "<lable style='color: #29a329;'>$status</label>";
									}
									elseif ($status=="Cancelled") 
									{
										echo "<lable style='color: #e60000;'>$status</label>";
									}
									
									?></td>
		  </tr>
		  <?php 
	
							}
						}
						else
						{
							//we don't have data
							//we will display the message inside table
							?>
	
							<tr>
								<td colspan="5">No Bookings Found.</td>
							</tr>
	
							<?php  
	
	
						}
					?>
	
		</tbody>
	  </table>
	</div>