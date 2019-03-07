<?php
$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["name"], $_POST["user_name"] , $_POST["password"]))
{
 $name = mysqli_real_escape_string($connect, $_POST["name"]);
 $user_name = mysqli_real_escape_string($connect, $_POST["user_name"]);
 $password= mysqli_real_escape_string($connect, $_POST["password"]);
 $query1 = mysqli_query($connect,"SELECT name FROM user_details WHERE name='$name'");
 $query2 = mysqli_query($connect,"SELECT user_name FROM user_details WHERE user_name='$user_name'");
 if ((mysqli_num_rows($query1) != 0) || (mysqli_num_rows($query2) != 0) )
 {
     echo "Already exists";
 }

 else
 {
   $query = "INSERT INTO user_details( name, user_name , password) VALUES('$name', '$user_name' , '$password')";



   if(mysqli_query($connect, $query))
   {
    echo 'Data Inserted';
   }
 }



}
?>
