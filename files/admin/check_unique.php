<?php

    $query_uname = "select uname from emp_info where uname='$uname'";
    $query_email = "select email from emp_info where email='$email'";
    $query_mobile = "select mobile from emp_info where mobile='$mobile'";
    $query_account = "select account from emp_info where account='$account'";
    $query_pan = "select pan from emp_info where pan='$pan'";

    $err = "";

    if(mysqli_num_rows(mysqli_query($conn,$query_uname))>0)
        $err .= "User already exists. ";
    if(mysqli_num_rows(mysqli_query($conn,$query_email))>0)
        $err .= "Email already exists. ";
    if(mysqli_num_rows(mysqli_query($conn,$query_mobile))>0)
        $err .= "Mobile already exists. ";
    if(mysqli_num_rows(mysqli_query($conn,$query_account))>0)
        $err .= "Account already exists. ";
    if(mysqli_num_rows(mysqli_query($conn,$query_pan))>0)
        $err .= "PAN already exists. ";

    if(strlen($err)>0){
        echo "<script>alert('$err');</script>";
        exit("Enter unique data");
    }

?>