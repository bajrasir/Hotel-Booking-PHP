<?php include('partials/header.php'); ?>

<?php ob_start(); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Booking</h1>
		<br>
		<br>
        <?php        

        if (isset($_GET['id']))
         {
        	# code...
        	$id=$_GET['id'];
        	// get all detail based on their id 
        	// query to get order details 
        	$sql="SELECT * FROM tbl_booking WHERE id=$id";

        	// execute the query 
        	$res=mysqli_query($conn,$sql);

        	// count the rows 

        	$count=mysqli_num_rows($res);

        	if($count==1)
        	{
        		// details available	
        		$row=mysqli_fetch_assoc($res);

        		$checkin = $row['checkin'];
                $checkout = $row['checkout'];
        		$adult=$row['adult'];
        		$child=$row['child'];
                $room =$row['room'];
                $numberofroom=$row['numberofroom'];
        		$fullname=$row['fullname'];
        		$email=$row['email'];
        		$contact=$row['contact'];
                $address=$row['address'];
        		$message=$row['message'];
        		$status=$row['status'];



        	}
        	else
        	{
        		// detail not available 
        		header('location:'.SITEURL.'admin/manage-booking.php');
        	}
        }
        else
        {
        	// redirect to manage order page 
        	header('location:'.SITEURL.'admin/manage-booking.php');
        }




        ?>




		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Check In</td>
					<td><b><?php echo $checkin; ?></b></td>
				</tr>

                <tr>
					<td>Check Out</td>
					<td><b><?php echo $checkout; ?></b></td>
				</tr>

                <tr>
					<td>Adult</td>
					<td>

						<input type="number" name="adult" value="<?php echo $adult ?>">
					</td>
				</tr>

                <tr>
					<td>Children</td>
					<td>

						<input type="number" name="child" value="<?php echo $child ?>">
					</td>
				</tr>

                <tr>
					<td>Room</td>
					<td><b><?php echo $room; ?></b></td>
				</tr>

                <tr>
					<td>Number Of Room</td>
					<td>

						<input type="number" name="numberofroom" value="<?php echo $numberofroom ?>">
					</td>
				</tr>

                <tr>
					<td>Full Name</td>
					<td><b><?php echo $fullname; ?></b></td>
				</tr>

				<tr>
					<td>Email</td>
					<td><b><?php echo $email; ?></b></td>
				</tr>

                <tr>
					<td>Contact</td>
					<td><b><?php echo $contact; ?></b></td>
				</tr>

                <tr>
					<td>Address</td>
					<td><b><?php echo $address; ?></b></td>
				</tr>

                <tr>
					<td>Message</td>
					<td><b><?php echo $message; ?></b></td>
				</tr>


				<tr>
					<td>Status</td>
					<td>
						<select name="status">
							<?php if(!$status == "Not Approved")
							{?>
							<option <?php if ($status=="Not Approved") 
							{
								echo "selected";
							} ?> value="Not Approved">Not Approved</option>

							<?php } ?>
							<option <?php if ($status=="Approved") 
							{
								echo "selected";
							} ?> value="Approved">Approved</option>
							<option <?php if ($status=="Cancelled") 
							{
								echo "selected";
							} ?> value="Cancelled">Cancelled</option>
							
						</select>
					</td>
				</tr>

				


				

					 </tr>
				

				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="checkin" value="<?php echo $checkin; ?>">
                        <input type="hidden" name="checkout" value="<?php echo $checkout; ?>">
                        <input type="hidden" name="room" value="<?php echo $room; ?>">
                        <input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                        <input type="hidden" name="address" value="<?php echo $address; ?>">
                        <input type="hidden" name="message" value="<?php echo $message; ?>">
						<input type="submit" name="submit" value="Update Booking" class="btn-secondary">
					</td>



				</tr>
			</table>
		</form>



		<?php   


                            //Import PHPMailer classes into the global namespace
		//These must be at the top of your script, not inside a function
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

		//Load Composer's autoloader
		require '../vendor/autoload.php';


			if (isset($_POST['submit']))
			 {
				//echo "Clicked";

				// get all values from form 
				$id=$_POST['id']; 
				$checkin=$_POST['checkin'];
                $checkout=$_POST['checkout'];
                $adult=$_POST['adult'];
				$child=$_POST['child'];
                $room=$_POST['room'];
				$numberofroom=$_POST['numberofroom'];
                $fullname=$_POST['fullname'];
                $email=$_POST['email'];
                $contact=$_POST['contact'];
                $address=$_POST['address'];
                $message=$_POST['message'];
				$status=$_POST['status'];

				// update the values 

				$sql2="UPDATE tbl_booking SET

				checkin=$checkin,
                checkout=$checkout,
                adult=$adult,
                child=$child,
                room=$room,
                numberofroom=$numberofroom,
				fullname='$fullname',
                email='$email',
                contact=$contact,
                address='$address',
                message='$message',
				status='$status'

				WHERE id=$id

				";

                // echo $sql2;
                // die();

				$res2=mysqli_query($conn,$sql2);

				// check whether query updated or not 

				if ($res2==true)
				 {


                    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'testkripapharmacy@gmail.com';                     //SMTP username
    $mail->Password   = 'qzldglbcgoydqmwx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($email);     //Add a recipient
    

  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'no-reply';
    $mail->Body    = 'Dear'.' '.$fullname.' '.'Thank You! Your Booking Has Been'.' '.$status;
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
					// Updated 
					$_SESSION['update']= "<div class='success'>Booking Update Successfully</div>";
					header('location:'.SITEURL.'admin/manage-booking.php');
				}
				else
				{
					// Failed TO Update 
					$_SESSION['update']= "<div class='error'>Failed To  Update Booking</div>";
					header('location:'.SITEURL.'admin/manage-booking.php');
				}




				

			}








		?>

	</div>
</div>                  



<?php ob_flush(); ?>






