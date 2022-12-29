<?php
	
include("partials/header.php");

?>

<?php ob_start(); ?>


<div class="main-content">
	<div class="wrapper">
		<h1>Add Room</h1>
		<br>
		<br>
		<?php  
		if (isset($_SESSION['upload']))
		 {
			echo $_SESSION['upload'];
			unset($_SESSION['upload']);
		}

		  ?>

		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title: </td>
					<td>
						<input type="text" name="title" placeholder="Title of the Room">
					</td>
				</tr>

                <tr>
					<td>Category: </td>
					<td>
						<select name="category">
							<?php 
							// Create php code to display categories from database

							// 1.create sql to get all active categories

							$sql="SELECT * from tbl_category WHERE active = 'Yes'";
							//Executing query
							$res=mysqli_query($conn,$sql);

							//count rows to check whether we have categories or not 

							$count=mysqli_num_rows($res);
							if($count>0)
							{
								// we have categories
								while ($row=mysqli_fetch_assoc($res))
								 {
									//get the details of category
									$id= $row['id'];
									$title=$row['name'];
									?>

									<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
									

									<?php
								}
							}
							else
							{
								// no category exist
								?>
								<option value="0">No Category Found</option>
								<?php

							
							}

							// Display on dropdown 						

							  ?>

							
						</select>

					</td>
				</tr>

                <tr>
					<td>Select Image: </td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				
                <tr>
					<td>Beds: </td>
					<td>
						<input type="number" name="beds" >
					</td>
				</tr>
                
                <tr>
					<td>Facility: </td>
					<td>
						<textarea name="facility" cols="30" rows="5" placeholder="Facility of the room"></textarea>
					</td>
			    </tr>
                <tr>
					<td>Adult: </td>
					<td>
						<input type="number" name="adult" >
					</td>
				</tr>

                <tr>
					<td>Child: </td>
					<td>
						<input type="number" name="child" >
					</td>
				</tr>

					<td>Active: </td>
					<td>
						<input type="radio" name="active" value="yes"> Yes
						<input type="radio" name="active" value="no"> No
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Room" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>


		<?php
			// check whether the button is clicked or not
		if (isset($_POST['submit']))
		 {
			// add the food in database
			//echo "Successfully Added";

			// 1.Get the data from the form 
			$title=$_POST['title'];
            $category=$_POST['category'];
            // 2.Upload the image if selected

		// check whether the select image image is clicked or not and upload the image only if the image is selected

		if (isset($_FILES['image']['name'])) 
		{
			// get the details of the selected image
			$image_name=$_FILES['image']['name'];

			// check whether the image is selected or not and upload image only if selected
			if($image_name!="")
			{
				// image is selected


				// 1.Rename the image
				//get the extentsion of selected image eg:jpg,png,gif
				// $ext=end(explode('.',$image_name));

                $ext_check=explode('.',$image_name);
                $ext=end($ext_check);

				// create new name for image
				$image_name="Room-Name-".rand(0000,9999).".".$ext;


				// 2.Upload the image

				// get source path and destination path 

				// source path is the current location of the image

				$src=$_FILES['image']['tmp_name'];

				// destination path to be uploaded

				$dst="../images/admin/rooms/".$image_name;

				// finally upload the image 

				$upload=move_uploaded_file($src, $dst);

				// check whether image uploaded or not

				if ($upload==false)
				 {
					// failed to upload the image

					// redirect to add food page with error message
				 	$_SESSION['upload'] ="<div class='error'>Failed to Upload Image</div>";
				 	header('location:'.SITEURL.'admin/add-room.php');
					// stop the process
					die();
				}

			}
		
			
		}

		else
		{
			$image_name=""; //setting default value as blank		
		}

			$beds=$_POST['beds'];
            $facility=$_POST['facility'];
            $adult=$_POST['adult'];
            $child=$_POST['child'];
                    // check whether radio button for featured or active are checked or not


                if (isset($_POST['active']))
                {
                // get the value from the form
                $active=$_POST['active'];
            }
            else
            {
                // set the default value
                $active="no";
            }
                    
	

		
			// 3.insert the data in the database

				// 3.1Create sql query to save or add food --- for numerical value we do not need to pass '' inside codes
			$sql2="INSERT INTO tbl_room SET

            category_id = $category,
			title='$title',
			image='$image_name',
			beds = $beds,
            facility = '$facility',
            adult = $adult,
            child = $child,
			active='$active'
			";


			// execute the query

			$res2=mysqli_query($conn,$sql2);

			// check whether data inserted are not
			//4.Redirect with message to manage food page
			if ($res2==true)
			 {
				// data inserted successfully
				$_SESSION['add'] = "<div class='success'>Room Successfully Added </div>";
				header('location:'.SITEURL.'admin/manage-room.php');
			}

			else
			{
				// failed to insert data
				$_SESSION['add'] = "<div class='error'>Failed To Add Room</div>";
				header('location:'.SITEURL.'admin/manage-room.php');
			}

			

		}

		?>

	</div>


</div>


<?php ob_flush(); ?>