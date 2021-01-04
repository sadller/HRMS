<?php

    session_start();
    if(!isset($_SESSION['username'])){
        echo "<script>location.href='../../login.php'</script>";
    }
    $username = $_SESSION['username'];

    $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());

    if(isset($_POST['submit_personal'])){
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $f_name = $_POST['f_name'];
        $m_status = $_POST['m_status'];
        $s_name = $_POST['s_name'];

        if($m_status!="Married")
            $s_name="";
        
        $query = "update emp_info set mobile='$mobile',email='$email',f_name='$f_name',m_status='$m_status',s_name='$s_name' where uname='$username'";

        if($conn->query($query) === TRUE) {
            $conn->close();
            echo "<script>location.href='view_profile.php'</script>";
        } else {
            echo "<script>alert('Some error occured in updating Personal Information');</script>" . $conn->error;
        } 
    }

    if(isset($_POST['submit_education'])){
        $m_degree=$_POST['m_degree'];
        $m_institute=$_POST['m_institute'];
        $m_year=$_POST['m_year'];
        $m_cgpa=$_POST['m_cgpa'];
        $b_degree=$_POST['b_degree'];
        $b_institute=$_POST['b_institute'];
        $b_year=$_POST['b_year'];
        $b_cgpa=$_POST['b_cgpa'];
        
        $query = "update emp_info set m_degree='$m_degree',m_institute='$m_institute',m_year='$m_year',m_cgpa='$m_cgpa',
                    b_degree='$b_degree',b_institute='$b_institute',b_year='$b_year',b_cgpa='$b_cgpa' where uname='$username'";

        if($conn->query($query) === TRUE) {
            $conn->close();
            echo "<script>location.href='view_profile.php'</script>";
        } else {
            echo "<script>alert('Some error occured in updating Education Details');</script>" . $conn->error;
        } 
    }


    if(isset($_POST['submit_joining'])){
        $type = $_POST['type'];
       
        $query = "update emp_info set type='$type' where uname='$username'";

        if($conn->query($query) === TRUE) {
            $conn->close();
            echo "<script>location.href='view_profile.php'</script>";
        } else {
            echo "<script>alert('Some error occured in updating Joining Details');</script>" . $conn->error;
        } 
    }


    if(isset($_POST['submit_payment'])){
        $basic = $_POST['basic'];
        $hra = $_POST['hra'];
        $conveyance = $_POST['conveyance'];
        $medical = $_POST['medical'];
        $special = $_POST['special'];
        $provident = $_POST['provident'];

        $query = "update emp_info set basic='$basic',hra='$hra',conveyance='$conveyance',medical='$medical',special='$special',provident='$provident' where uname='$username'";

        if($conn->query($query) === TRUE) {
            $conn->close();
            echo "<script>location.href='view_profile.php'</script>";
        } else {
            echo "<script>alert('Some error occured in updating Payment Details');</script>" . $conn->error;
        } 
    }


    if(isset($_POST['submit_bank'])){
        $bankname = $_POST['bankname'];
        $account = $_POST['account'];
        $pan = $_POST['pan'];

        $query = "update emp_info set bankname='$bankname',account='$account',pan='$pan' where uname='$username'";

        if($conn->query($query) === TRUE) {
            $conn->close();
            echo "<script>location.href='view_profile.php'</script>";
        } else {
            echo "<script>alert('Some error occured in updating Bank Details');</script>" . $conn->error;
        } 
    }


    if(isset($_POST['submit_address'])){
        $c_address = $_POST['c_address'];
        $p_address = $_POST['p_address'];

        $query = "update emp_info set c_address='$c_address',p_address='$p_address' where uname='$username'";

        if($conn->query($query) === TRUE) {
            $conn->close();
            echo "<script>location.href='view_profile.php'</script>";
        } else {
            echo "<script>alert('Some error occured in updating Address Details');</script>" . $conn->error;
        } 
    }

?>