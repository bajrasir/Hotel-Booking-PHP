<?php  
	include('partials/header.php');
?>

<?php  
    ob_start();
?>
	

<div class="main-content">
	<div class="wrapper">
		<h1>Upadate Room</h1>
		<br><br>

	<?php 
			//check whether id  is set or not
			if(isset($_GET['id']))
			{
				//get all the details
				$id = $_GET['id'];

				//sql query to get the selected food
				$sql2 = "SELECT * from tbl_room WHERE id = $id";

				//execute the  query
				$res2 = mysqli_query($conn,$sql2);

				$count2=mysqli_num_rows($res2);

				if($count2==1)
				{


				//get the value based on the query executed
				$row2 = mysqli_fetch_assoc($res2);



				//get the individual value of the selected food
                $current_category = $row2['category_id'];
				$title = $row2['title'];
                $current_image = $row2['image'];
                $beds = $row2['beds'];
                $facility = $row2['facility'];
                $adult = $row2['adult'];
                $child = $row2['child'];
				$active = $row2['active'];
				}
				else
				{
					$_SESSION['no-Room-found']="<div class='error'>No Room Found.</div>";
					header('location:'.SITEURL.'admin/manage-room.php');
				}
			}

			
			else
			{
				//redirect to manage food
				header('location:'.SITEURL.'admin/manage-room.php');
			}
		 ?>

		<form method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td>
						<input type="text" name="title" value="<?php echo $title; ?>">
					</td>
				</tr>

                <tr>
					<td>Current Image:</td>
					<td>
						<?php 
							if ($current_image!="") 
							{
								//Image availabel
										?>
								<img src="<?php echo SITEURL; ?>images/admin/rooms/<?php echo $current_image; ?>"width="100px">
								<?php 
								
							}
							else
							{
								//Image not available
								echo "<div class='error'>Image not available.</div>";
								
							}
						?>
					</td>
				</tr>
				<tr>
					<td>Select New Image:</td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				
                <tr>
					<td>Beds:</td>
					<td>
						<input type="number" name="beds" value="<?php echo $beds; ?>">
					</td>
				</tr>

        
				<tr>
					<td>Facility:</td>
					<td>
						<textarea name="facility" cols="30" rows="5"><?php echo $facility;  ?></textarea>
					</td>
				</tr>

                <tr>
					<td>Adult:</td>
					<td>
						<input type="number" name="adult" value="<?php echo $adult; ?>">
					</td>
				</tr>

                <tr>
					<td>Child:</td>
					<td>
						<input type="number" name="child" value="<?php echo $child; ?>">
					</td>
				</tr>
				<tr>
					<td>Category:</td>
					<td>
						<select name="category">

							<?php  
							//query to get active caategories
							$sql = "SELECT * FROM tbl_category WHERE active ='yes' ";

							//execute the query
							$res = mysqli_query($conn,$sql);

							//count rows
							$count = mysqli_num_rows($res);

							//check whether the category available or not
							if($count>0)
							{
								//category available
								while ($row = mysqli_fetch_assoc($res)) 
								{
									$category_title = $row['name'];
									$category_id = $row['id'];
									
									//echo "<option  value='$category_id'>$category_title</option>"; 

									?>

									<option <?php if ($current_category == $category_id) {echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

									<?php  
								}
							}
							else
							{
								//category not available
								echo "<option value='0'>Category Not Available.</option>";
							}

							?>

							
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Active:</td>
					<td>
						<input <?php if ($active == "yes") {echo "checked";} ?> type="radio" name="active" value="yes">Yes
						<input <?php if ($active == "no") {echo "checked";} ?> type="radio" name="active" value="no">No
					</td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
						<input type="submit" name="submit" value="Update Room" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>

	<?php  
		if (isset($_POST['submit'])) 
		{
			//get all the details from the form
			// $id = $_POST['id'];
			$title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $beds = $_POST['beds'];
            $facility = $_POST['facility'];
            $adult = $_POST['adult'];
            $child = $_POST['child'];
			$category = $_POST['category'];
			$active = $_POST['active'];


			//upload the image if selected

			//check whether upload button is clicked or not
			if (isset($_FILES['image']['name'])) 
			{
				//upload button clicked.
				$image_name = $_FILES['image']['name'];//new image name

				//check whether the file is available or not
				if ($image_name!= "") 
				{
					//image is available
					//uploading new image


					//rename the image
					$ext = end(explode('.', $image_name));//get the extension of the image
					$image_name = "Room-Name-".rand(0000, 9999).'.'.$ext;//this will be renamed image 

					//get the source path and destination ppath
					$src_path = $_FILES['image']['tmp_name'];//src path
					$dest_path = "../images/admin/rooms/".$image_name;//destination path 

					//uploaod the image
					$upload = move_uploaded_file($src_path, $dest_path);

					//check whether the image is uoloaded or not
					if ($upload == false) 
					{
						//failed to upload
						$_SESSION['upload'] = "<div class='error'>Failed to upload new image.</div>";	
						//redirect to manage food
						header('location:'.SITEURL.'admin/manage-room.php');	
						//stop the process
						die(); 		
					}
					//remove the image if new image is uploaded

					//remove current image if availabel
					if ($current_image!= "")
					{
						//current image is available
						//remove image
						$remove_path = "../images/admin/rooms".$current_image;


						$remove = unlink($remove_path);

						//check whether the image is removed or not
						if ($remove=false) 
						{
							//failed to remove current image
							$_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image.</div>";
							//redirect to manage food
							header('location:'.SITEURL.'admin/manage-room.php');
							//stop the process
							die();
						}

					}

					
				}
			
			else
			{
				$image_name=$current_image;
			}

		}
			else
			{
				$image_name = $current_image;
			}


			//update the food in db
			$sql3 = "UPDATE tbl_room SET
                category_id = '$category',
				title = '$title',
                image = '$image_name',
                beds = $beds,
				facility = '$facility',
                adult = $adult,
                child = $child,
				active = '$active'
				WHERE id=$id
			";

			//execute the sql query
			$res3 = mysqli_query($conn,$sql3);

			//check whether the query is executed or not
			if ($res3 == true) 
			{
				//query executed and food updated
				$_SESSION['update']="<div  class='success'>Room Updated successfully.</div>";
				header('location:'.SITEURL.'admin/manage-room.php');
			}
			else
			{
				//failed to update food
				$_SESSION['update']="<div  class='error'>Failed to update Rooom.</div>";
				header('location:'.SITEURL.'admin/manage-Room.php');
			}

			//redirect to manage food with session msg

		}
	?>

	</div>
</div>

<?php  
    ob_flush();
?>