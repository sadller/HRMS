<?php
    $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
    $user = $_SESSION['username'];
    $query = "select * from emp_info where uname='$user'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        if($row = mysqli_fetch_assoc($result)) {
            $empid=$row['empid'];
            $title=$row['title'];
            $fname=$row['fname'];
            $lname=$row['lname'];
            $uname=$row['uname'];
            $password=$row['password'];
            $photo=$row['photo'];
            $mobile=$row['mobile'];
            $dob=$row['dob'];
            $email=$row['email'];
            $nationality=$row['nationality'];
            $c_address=$row['c_address'];
            $p_address=$row['p_address'];
            $gender=$row['gender'];
            $doj=$row['doj'];
            $type=$row['type'];
            $basic=$row['basic'];
            $hra=$row['hra'];
            $conveyance=$row['conveyance'];
            $medical=$row['medical'];
            $special=$row['special'];
            $provident=$row['provident'];
            $bankname=$row['bankname'];
            $account=$row['account'];
            $pan=$row['pan'];
            $m_degree=$row['m_degree'];
            $m_institute=$row['m_institute'];
            $m_year=$row['m_year'];
            $m_cgpa=$row['m_cgpa'];
            $b_degree=$row['b_degree'];
            $b_institute=$row['b_institute'];
            $b_year=$row['b_year'];
            $b_cgpa=$row['b_cgpa'];
            $f_name=$row['f_name'];
            $m_status=$row['m_status'];
            $s_name=$row['s_name'];
            $image_path="../admin/photos/".$photo;
        }
    } else {
        echo "0 results";
    }

?>