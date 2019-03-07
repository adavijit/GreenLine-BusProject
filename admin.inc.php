<?php
session_start();
if(isset($_POST['adSubmitlogIn']))
{
    include 'dbHandler.php';

    $uid = mysqli_real_escape_string($conn,$_POST['adminID']);
    $pwd = mysqli_real_escape_string($conn,$_POST['passAD']);

    //empty check
    if(empty($uid)|| empty($pwd))
    {
        header("Location: index.php?login=empty");
        exit();
    }
    else
    {
        $sql ="SELECT * FROM admin_details WHERE ad_user_name='$uid'";
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
                if(($uid==$row['ad_user_name'] && $pwd==$row['ad_password'])== true)
                {
                    //logged in user
                    $_SESSION['a_id'] = $row['id'];
                    $_SESSION['a_name'] = $row['ad_name'];
                    $_SESSION['a_uName'] = $row['ad_user_name'];
                    $_SESSION['a_password'] = $row['ad_password'];


                    header("Location: admin.php?login=SUCCESS");
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
