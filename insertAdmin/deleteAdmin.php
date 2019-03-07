<?php
$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM admin_details WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>
