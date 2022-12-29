<?php

include('partials/header.php'); ?>

<?php ob_start(); ?>

<div clas="main-content">
<div class="wrapper">
<h1>Update Category</h1>

<br><br>
<?php 
	// check whether the id is set or not
	if(isset($_GET['id']))
	 {
		$id=$_GET['id'];

		// create sql query to get all the date
		$sql="SELECT * FROM tbl_category where id=$id";

		// execute the query

		$res=mysqli_query($conn,$sql);

		// count the rows to check whether the id is valid or not

		$count=mysqli_num_rows($res);

		if($count==1)
		{
			// get all the data of that id

			$row=mysqli_fetch_assoc($res);
			$title=$row['name'];
			$current_image = $row['image'];
			$room = $row['number_of_room'];
                $bathroom = $row['bathroom'];
                $sofa = $row['sofa'];
                $adult = $row['adult'];
                $child = $row['child'];
			$description=$row['description'];
            $price=$row['price'];
			$active=$row['active'];

		}
		else
		{
			// redirect to manage Category page with message
			$_SESSION['no-category-found'] ="<div class='error>Category Not Found.</div>";
			header('location:'.SITEURL.'admin/manage-category.php');
		}

			
	  }
	else
	{
		// redirect to manage Category
		header('location:'.SITEURL.'admin/manage-category.php');
	}
?>
<form action="" method="POST" enctype="multipart/form-data">
				<table class="tbl-30">
					<tr>
						<td>Title: </td>
						<td>
							<input type="text" name="title" value="<?php echo $title; ?>">
						</td>
					</tr>

					<tr>
						<td>Current Image:
						</td>
						<td>
							<?php
							if ($current_image!="")
							 {
								// display the image
								?>
								<img src="<?php echo SITEURL; ?>images/admin/category/<?php echo $current_image; ?>" width='100px';>
								<?php
								
							}

							else
							{
								// display message
								echo "<div class='error'>Image Not Found</div>";
							}

							?>
						</td>
					</tr>

					<tr>
						
						<td>
							New Image:
						</td>
						<td>
							<input type="file" name="image">
						</td>
					</tr>
					<tr>
					<td>Room:</td>
					<td>
						<input type="number" name="room" value="<?php echo $room; ?>">
					</td>
				</tr>

                <tr>
					<td>Bathroom:</td>
					<td>
						<input type="number" name="bathroom" value="<?php echo $bathroom; ?>">
					</td>
				</tr>
                <tr>
					<td>Sofa:</td>
					<td>
						<input type="number" name="sofa" value="<?php echo $sofa; ?>">
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
					<td>Description:</td>
					<td>
						<textarea name="description" cols="30" rows="5"><?php echo $description;  ?></textarea>
					</td>
				</tr>
				<tr>
					<td>Price:</td>
					<td>
						<input type="number" name="price" value="<?php echo $price; ?>">
					</td>
				</tr>

					<tr>
						<td>Active:</td>

						<td>
							<input <?php if ($active=='yes')
							 {
								echo "checked";
							} ?> type="radio" name="active" value="yes">Yes
							<input <?php if ($active=='no')
							 {
								echo "checked";
							} ?> type="radio" name="active" value="no">No
						</td>

					</tr>

					<tr>
						<td>
							<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
							<input type="hidden" name="id" value="<?php  echo $id; ?>">
							<input type="submit" name="submit" value="Update Category" class="btn-secondary">
						</td>
					</tr>


				</table>
</form>


<?php
	
	if (isset($_POST['submit']))
	 {
		//echo "Clicked";

		// get all the values from our form
		$id=$_POST['id'];
		$title=$_POST['title'];
		$current_image=$_POST['current_image'];
		$room = $_POST['room'];
		$bathroom = $_POST['bathroom'];
		$sofa = $_POST['sofa'];
		$adult = $_POST['adult'];
		$child = $_POST['child'];
		$description=$_POST['description'];
        $price=$_POST['price'];
		$active=$_POST['active'];

		// updating new image if selected

		// check whether the image is selected or not
		if (isset($_FILES['image']['name']))
		 {
			// get the image details
			$image_name=$_FILES['image']['name'];

			// check if the image is available or not
			if($image_name!="")
			{
				// image available


				// upload the new image
				// auto rename our imagw with the same name
		 	// get the extenstion of our image(jpg,png,gif) eg: food1.jpg

			 	// $ext =end(explode('.',$image_name));

                 $ext_check=explode('.',$image_name);
                 $ext=end($ext_check);

			 	// rename the image

			 	$image_name = "Room_Category_".rand(000,999).'.'.$ext; //eg:Food_Category_834.jpg



			 	$source_path=$_FILES['image']['tmp_name'];

			 	$destination_path= "../images/admin/category/".$image_name;

			 	// finally upload the image

			 	$upload=move_uploaded_file($source_path, $destination_path);

			 	// check whether the image is uploaded or not 

			 	// and if the image is not uploaded then we will stop the process and redirect with error message

			 	if ($upload==false)
			 	 {
			 		// set message

			 		$_SESSION['upload']="<div class='error'>Failed to upload image.</div>";

			 		// redirect to manage cateogry page

			 		header('location:'.SITEURL.'admin/manage-category.php');

			 		// stop the process
			 		die();

		 	}
				// remove the current image if available
		 	if ($current_image!="")
		 	{
		 	 	$remove_path="../images/admin/category/".$current_image;
		 		$remove=unlink($remove_path);

		 	// check whether the image is removed or not 

		 	// if fail to remove then display message and stop the process
		 	if ($remove=false) 
			 	{
			 		// failed to remove image
			 		$_SESSION['failed-remove']="<div class='error'>Failed to remove current image.</div>";
			 		header('location:'.SITEURL.'admin/manage-category.php');
			 		die();
			 	}
			 		
		 	}
		 	
			}

			else
		{
			// we need to set the current image as new image
			$image_name=$current_image;
		}
		}
		else
		{
			// we need to set the current image as new image
			$image_name=$current_image;
		}

		

		// update the database and redirect to manage category with message

		$sql2="UPDATE tbl_category set
			name='$title',
			image='$image_name',
			number_of_room = $room,
                bathroom = $bathroom,
                sofa = $sofa,
                adult = $adult,
                child = $child,
			description ='$description',
            price ='$price',
			active='$active'
			WHERE id=$id
		";

		// execute the query

		$res2=mysqli_query($conn,$sql2);

		// check whether query executed or not
		if ($res2==true)
		 {

		 	// category updated
			$_SESSION['update']="<div class='success'>Category Successfully Updated.</div>";
			header('location:'.SITEURL.'admin/manage-category.php');
		}
		else
		{
			// failed to update category
			$_SESSION['update']="<div class='error'>Category Updated Failed.</div>";
			header('location:'.SITEURL.'admin/manage-category.php');
		}

	}

?>


</div>
</div>

<?php ob_flush(); ?>

