<?php
include('partials/header.php'); 
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Partner</h1>
		<br>
		<br>

		<?php

	if(isset($_SESSION['add']))
	{
	echo $_SESSION['add'];
	unset($_SESSION['add']);
	}

	if (isset($_SESSION['remove'])) 
	{
		echo $_SESSION['remove'];
		unset($_SESSION['remove']);
	}

	if (isset($_SESSION['delete'])) 
	{
		echo $_SESSION['delete'];
		unset($_SESSION['delete']);
	}
	if (isset($_SESSION['no-category-found']))
	 {
		echo $_SESSION['no-category-found'];
		unset($_SESSION['no-category-found']);
	}
	if (isset($_SESSION['update']))
	 {
		echo $_SESSION['update'];
		unset($_SESSION['update']);
	}
	if (isset($_SESSION['upload']))
	 {
		
		
	}
	if (isset($_SESSION['failed-remove']))
	 {
		echo $_SESSION['failed-remove'];
		unset($_SESSION['failed-remove']);
	}
	?>
	<br><br>
			<!--Button to Add Admin-->
			<a href="<?php echo SITEURL; ?>admin/add-partner.php" class="btn-primary">Add Partner</a>
			<br>
			<br>
			<br>
			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
					<th>Title</th>
					<th>Image</th>
					<th>Actions</th>
				</tr>

				<?php
					// query to get all category from database
					$sql="SELECT * FROM tbl_partners";

					// execute query
					$res =mysqli_query($conn,$sql);

					// count the rows

					$count=mysqli_num_rows($res);

					// create serial number variable assign value as 1

					$sn=1;


					// check whether we have data in database or not

					if($count>0)
					{
						// we have data in our database
						// get the data and display the data

						while ($row=mysqli_fetch_assoc($res))   {
									$id=$row['id'];
									$title=$row['name'];
								    $image_name=$row['image'];
									

					?>

								<tr>
									<td><?php echo $sn++;?></td>
									<td><?php echo $title ?></td>
									<td>
										<?php  
											// check whether image name is avaibale or not
										if($image_name!="")
										{
											// display the name
											?>
											
											<img src="<?php echo SITEURL; ?>images/admin/partners/<?php echo $image_name; ?>" width="100px";
											<?php
										}
										else
										{
											// display message
											echo "<div class='error'>Image Not Found</div>";
										}
                                    
										?>
									</td>
									<td>
									<a href="<?php echo SITEURL; ?>admin/update-partner.php?id=<?php echo $id; ?>" class="btn-secondary">Update Partner</a> 
									<a href="<?php echo SITEURL; ?>admin/delete-partner.php?id=<?php echo $id; ?> &image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Partner</a>
									</td>
								</tr>

									<?php

								}

					}
					else
					{
						// we do not have data in our database
						?>
							<tr>

							<td colspan="6"><div class='error'>No Partners Added.</td>
							</tr>
						<?php

					}

				?>
				
			</table>
	</div>
</div>
