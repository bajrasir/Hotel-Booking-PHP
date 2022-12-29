
<?php  

$conn = mysqli_connect("localhost","root","","hotel-reservation") or die("Connection Failed");

if($_POST['type'] == "")
{

                $sql = "SELECT * FROM tbl_category";

            $query = mysqli_query($conn,$sql);

            $str = "";

            while($row = mysqli_fetch_assoc($query))
            {
                $str .="<option value='{$row['id']}'>{$row['name']}</option>";
            }
}
else if($_POST['type'] == "roomData")
{
    $sql = "SELECT * FROM tbl_category WHERE id = {$_POST['id']}";

            $query = mysqli_query($conn,$sql);

            $single_row=mysqli_fetch_row($query);
            
             //print_r($single_row);
           // die();
                       $str = "";
            
            if ($single_row)
            {
                for($i=1; $i<=$single_row[3]; $i++)
                {
                        $str .="<option value={$i}>{$i}</option>";
                }
            }
}
    



echo $str;

?>