<?php
include('partials/header.php');
?>

<?php ob_start(); ?>

	<div class="main-content">
		<div class="wrapper">
<h1>Add Category</h1>
<br><br>

<?php
if(isset($_SESSION['add']))
{
	echo $_SESSION['add'];
	unset($_SESSION['add']);
}

if(isset($_SESSION['upload']))
{
	echo $_SESSION['upload'];
	unset($_SESSION['upload']);
}
?>
<br><br>

<!-- start of add category -->

<form action="" method="POST" enctype="multipart/form-data">
		<table class="tbl-30">
			<tr>
				<td>Title:</td>
				<td>
					<input type="text" name="title" placeholder="Category Title">
				</td>
			</tr>

			<tr>
				<td>Select Image:</td>
				<td>
					<input type="file" name="image">
				</td>
			</tr>

			<tr>
					<td>Room: </td>
					<td>
						<input type="number" name="room" >
					</td>
				</tr>

				<tr>
					<td>Bathroom: </td>
					<td>
						<input type="number" name="bathroom" >
					</td>
				</tr>

				<tr>
					<td>Sofa: </td>
					<td>
						<input type="number" name="sofa" >
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

            <tr>
					<td>Description: </td>
					<td>
						<textarea name="description" cols="30" rows="5" placeholder="Description of the room"></textarea>
					</td>
			</tr>
            <tr>
					<td>Price: </td>
					<td>
						<input type="number" name="price" >
					</td>
				</tr>
			<tr>
				<td>Active:</td>

				<td>
					<input type="radio" name="active" value="yes">Yes

					<input type="radio" name="active" value="no">No
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value="Add Category" class="btn-secondary">
				</td>
			</tr>

		</table>
</form>

<!-- end of add category -->

<?php
	// check whether the submit button is clicked or not
	if (isset($_POST['submit']))
	 {
		//echo 'Clcked';

		// get the value from category form

		$title=mysqli_real_escape_string($conn,$_POST['title']);

		// for radio input type we need to check whether the button is seleted or not

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

        $description=$_POST['description'];
        $price=$_POST['price'];
		$room=$_POST['room'];
            $bathroom=$_POST['bathroom'];
            $sofa=$_POST['sofa'];
            $adult=$_POST['adult'];
            $child=$_POST['child'];

		// check whether the image is selected or not and set the value for image name accordingly

		//print_r($_FILES['image']);

		//die(); //break the code here

		if (isset($_FILES['image']['name']))
		 {
			// upload the image
			// to upload image we need image name and source path and destination path
		 	$image_name=$_FILES['image']['name'];

		 	// upload the image only if image is selected 

		 	if ($image_name!="")
		 	 {
		 	// auto rename our imagw with the same name
		 	// get the extenstion of our image(jpg,png,gif) eg: food1.jpg

			 	// $ext=end(explode('.',$image_name));

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
			 		// redirect to add cateogry page
			 		header('location:'.SITEURL.'admin/add-category.php');
			 		// stop the process
			 		die();

		 	}
		 }

		 }
		 else
		 {
		 	// don't upload image and set the image name value as blank
		 	$image_name="";
		 }

		// create sql query to insert the cateogry into database

		$sql="INSERT into tbl_category SET
			name='$title',
			image='$image_name',
			number_of_room = $room,
            bathroom = $bathroom,
            sofa = $sofa,
            adult = $adult,
            child = $child,
			description='$description',
            price = $price,
			active='$active'
			";

	// echo($sql);
	// die();
			// execute the query and save in database

			$res=mysqli_query($conn,$sql);

			// check whether the query executed or not and data added or not

			if($res==true)
			{
				// query executed and cateogry added successfully
				$_SESSION['add']="<div class='success>Category Added Successfully</div>";
				header('location:'.SITEURL.'admin/manage-category.php');
                
			}
			else
			{
				// failed to add cateogry 
				$_SESSION['add']="<div class='error>Category Added Failed</div>";
				header('location:'.SITEURL.'admin/add-category.php');
              
			}
	}

?>

		</div>

	</div>

    <?php ob_flush(); ?>


 