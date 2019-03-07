<?php
$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["id"],$_POST["column_name"],$_POST["value"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE main_input SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>
