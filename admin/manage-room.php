<?php
include('partials/header.php');
?>

<?php ob_start(); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Rooms</h1>
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
			<a href="<?php echo SITEURL; ?>admin/add-room.php" class="btn-primary">Add Room</a>
			<br>
			<br>
			<br>
			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
                    <th>Title</th>
					<th>Category</th>
                    <th>Image</th>
					<th>Beds</th>
					<th>Facility</th>
                    <th>Adult</th>
                    <th>Child</th>
                    <th>Active</th>
					<th>Actions</th>
				</tr>
						<?php 
						// create a sql query to get all the data from the database
						$sql="SELECT * FROM tbl_room";

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
								$category_id = $row['category_id'];
								$title=$row['title'];
                                $image_name=$row['image'];
                                $beds=$row['beds'];
                                $facility=$row['facility'];
                                $adult=$row['adult'];
                                $child=$row['child'];
								$active=$row['active'];
								?>

								<tr>
									<td><?php echo $sn++;?>. </td>
									<td><?php echo $title; ?></td>
									<td><?php 



$sql_category="SELECT * FROM tbl_category WHERE id=$category_id";

// execute the query

$res_cateogry=mysqli_query($conn,$sql_category);

// count the rows to check whether we have food or not

$count_category=mysqli_num_rows($res);
// create serial number and set default value 1


if ($count_category>0)
 {
	// we have food in the database
	// get the food from database and display

	while ($row_category=mysqli_fetch_assoc($res)) 
	{
		// get the value from individual columns

		$id=$row_category['id'];
		$title_category=$row_category['name']
		?>
									
									
									echo $title_category;</td>
									<?php 
	}
}

?>
									
                                    <td>
										<?php 
										// check whether we have image or not

										if ($image_name=="")

										 {
											echo "<div class='error'>Image not Added.</div>";
										}
										else
										{
											?>
											<img src="<?php echo SITEURL; ?>images/admin/rooms/<?php echo $image_name ; ?>" width="100px">
											<?php
										}

										 ?>
											
										</td>
									<td><?php echo $beds; ?></td>
                                    <td><?php echo $facility; ?></td>
                                    <td><?php echo $adult; ?></td>
                                    <td><?php echo $child; ?></td>
									<td><?php echo $active; ?></td>
									<td>
										<a href="<?php echo SITEURL; ?>admin/update-room.php?id=<?php echo $id; ?>" class="btn-secondary">Update Room</a> 
										<a href="<?php echo SITEURL; ?>admin/delete-room.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Room</a>
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

<?php ob_flush(); ?>