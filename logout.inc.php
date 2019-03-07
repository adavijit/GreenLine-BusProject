<?php
session_start();
if(isset($_POST['submitLogOut']))
{
    session_unset();
    session_destroy();

    header("Location: index.php?lougout=SUCCESS");
    exit();
}