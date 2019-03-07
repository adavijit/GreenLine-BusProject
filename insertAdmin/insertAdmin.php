<?php
$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["ad_name"], $_POST["ad_user_name"] , $_POST["ad_password"]))
{
 $name = mysqli_real_escape_string($connect, $_POST["ad_name"]);
 $user_name = mysqli_real_escape_string($connect, $_POST["ad_user_name"]);
 $password= mysqli_real_escape_string($connect, $_POST["ad_password"]);

 $query1 = mysqli_query($connect,"SELECT ad_user_name FROM admin_details WHERE ad_user_name='$user_name'");
 $query2 = mysqli_query($connect,"SELECT ad_name FROM admin_details WHERE ad_name='$name'");
  if ((mysqli_num_rows($query1) != 0) || (mysqli_num_rows($query2) != 0) )
  {
      echo "Already exists";
  }

  else
  {
    $query = "INSERT INTO admin_details( ad_name, ad_user_name , ad_password) VALUES('$name', '$user_name' , '$password')";
    if(mysqli_query($connect, $query))
    {
     echo 'Data Inserted';
    }
  }

}
?>
