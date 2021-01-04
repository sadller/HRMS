<?php
    include_once("edit_emp_validate.php");
            $uname=$_POST['uname'];
            $password=$_POST['password'];
            $mobile=$_POST['mobile'];
            $dob=$_POST['dob'];
            $email=$_POST['email'];
            $nationality=$_POST['nationality'];
            $c_address=$_POST['c_address'];
            $p_address=$_POST['p_address'];
            $doj=$_POST['doj'];
            $type=$_POST['type'];
            $basic=$_POST['basic'];
            $hra=$_POST['hra'];
            $conveyance=$_POST['conveyance'];
            $medical=$_POST['medical'];
            $special=$_POST['special'];
            $provident=$_POST['provident'];
            $bankname=$_POST['bankname'];
            $account=$_POST['account'];
            $pan=$_POST['pan'];
            $pan=strtoupper($pan);
            $m_degree=$_POST['m_degree'];
            $m_institute=$_POST['m_institute'];
            $m_year=$_POST['m_year'];
            $m_cgpa=$_POST['m_cgpa'];
            $b_degree=$_POST['b_degree'];
            $b_institute=$_POST['b_institute'];
            $b_year=$_POST['b_year'];
            $b_cgpa=$_POST['b_cgpa'];
            $f_name=$_POST['f_name'];
            $m_status=$_POST['m_status'];
            $s_name=$_POST['s_name'];
        if(count($errors)==0){
            $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());


            $query = "update emp_info set password='$password',mobile='$mobile',dob='$dob',email='$email',
                        nationality='$nationality',c_address='$c_address',p_address='$p_address',doj='$doj',type='$type',basic='$basic',
                        hra='$hra',conveyance='$conveyance',medical='$medical',special='$special',provident='$provident',
                        bankname='$bankname',account='$account',pan='$pan',m_degree='$m_degree',m_institute='$m_institute',
                        m_year='$m_year',m_cgpa='$m_cgpa',b_degree='$b_degree',b_institute='$b_institute',b_year='$b_year',
                        b_cgpa='$b_cgpa',f_name='$f_name',m_status='$m_status',s_name='$s_name'  where uname='$uname'";

            if ($conn->query($query) === TRUE) {
                echo "<script>alert('Successfully updated');</script>";
                echo "<script>location.href='edit_employee.php'</script>";
            } else {
                echo "<script>alert('Some error occured');</script>" . $conn->error;
            }
            $conn->close();
        }
        else{
            echo "<script>alert('Incorrect data. Not updated');</script>";
            //print_r($errors);
            echo "<script>location.href='edit_employee.php'</script>";
        }
?>