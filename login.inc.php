<?php

session_start();
if(isset($_POST['submitlogIn']))
{
    include 'dbHandler.php';

    $uid = mysqli_real_escape_string($conn,$_POST['operatorID']);
    $pwd = mysqli_real_escape_string($conn,$_POST['passOP']);

    //empty check
    if(empty($uid)|| empty($pwd))
    {
        header("Location: index.php?login=empty");
        exit();
    }
    else
    {
        $sql ="SELECT * FROM user_details WHERE user_name='$uid'";
        $result =  mysqli_query($conn, $sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck<1)
        {
            header("Location: index.php?login=notFound");
            exit();
        }
        else
        {
            if ($row = mysqli_fetch_assoc($result))
            {
                if(($uid==$row['user_name'] && $pwd==$row['password'])== true)
                {
                    //logged in user
                    $_SESSION['u_id'] = $row['id'];
                    $_SESSION['u_name'] = $row['name'];
                    $_SESSION['u_uName'] = $row['user_name'];
                    $_SESSION['u_password'] = $row['password'];


                    header("Location: userHome.php?login=SUCCESS");
                    exit();
                }
                else
                {
                    header("Location: index.php?login=error");
                    exit();
                }
            }
        }
    }
}
else{
    header("Location: index.php?login=error");
    exit();
}