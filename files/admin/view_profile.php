<?php
session_start();
if(!isset($_SESSION['uname'])){
        echo "<script>location.href='../../login.php'</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
    <style>
        body{overflow-x: hidden;}
        #photo{height:200px;width:190px;border-radius:100px;}
        #back{
            background-image:url('../../img/pic8.jpg');
            background-size:contain;
            background-attachment: fixed;
            color:white;
        }
        h3{color:black;font-weight:bold;}
        label{color:darkgoldenrod;}
        .box{background:rgba(0,0,0,0.5);border:none;}
        .box-sm{background:rgba(0,0,0,0.7);}
    </style>
</head>
<body id="back">

    <?php
        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
        $name=$_POST['ID'];
        //echo "<script>alert('$name')</script>";
        $query = "select * from emp_info where uname='$name'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            
            $row = mysqli_fetch_assoc($result);
            
            $empid=$row['empid'];
            $title=$row['title'];
            $fname=$row['fname'];
            $lname=$row['lname'];
            $uname=$row['uname'];
            $password=$row['password'];
            $photo=$row['photo'];
            $image_path="photos/".$photo;
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
         }

    ?>
    
    <div class="container">
    <div class="row">
        <div class="col-md-3 box text-center"><img src="<?php echo $image_path; ?>" id="photo"/></div>    
        <div class="col-md-1"></div>
        <div class="col-md-3">
        <div class="row"><h3 class="page-header"><?php echo $title." ".$fname." ".$lname ?></h3></div>
        <div class="row"><h3><?php echo "EMP".substr($doj,2,2).$empid ?></h3></div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2">
        <br><br><br><br><br><br><br><br>
            <div class="box-sm text-center"><label>Password&nbsp;:&nbsp;&nbsp;&nbsp;</label><span id="password"><?php echo $password ?></span></div>
        </div>
    </div>
    </div>
    <br><br>
    
    
    <div class="container-fluid row">
    <div class="col-md-5 box" style="margin-left:80px;">
        <h3 class="page-header text-center">Personal Information</h3><br>
        <table class="table box-sm">
            <tr><td><label>Username</label></td><td><span id="uname"><?php echo $uname ?></span></td></tr>
            <tr><td><label>Date of Birth</label></td><td><span id="dob"><?php echo $dob ?></span></td></tr>
            <tr><td><label>Age</label></td><td><span id="age"><?php   $diff=date_diff(date_create($dob),date_create(date("Y-m-d")));    echo $diff->format("%y years"); ?></span></td></tr>
            <tr><td><label>Gender</label></td><td><span id="gender"><?php echo $gender ?></span></td></tr>
            <tr><td><label>Mobile</label></td><td><span id="mobile"><?php echo $mobile ?></span></td></tr>
            <tr><td><label>Email</label></td><td><span id="email"><?php echo $email ?></span></td></tr>
            <tr><td><label>Father's Name</label></td><td><span id="f_name"><?php echo $f_name ?></span></td></tr>
            <tr><td><label>Marital Status</label></td><td><span id="m_status"><?php echo $m_status ?></span></td></tr>
            <tr><td><label>Spouse Name</label></td><td><span id="s_name"><?php echo $s_name ?></span></td></tr>
            <tr><td><label>Nationality</label></td><td><span id="nationality"><?php echo $nationality ?></span></td></tr>
        </table>
    </div>

    <div class="col-md-5 box" style="margin-left:80px;margin-bottom:40px;">
        <h3 class="page-header text-center">Education Details</h3>
        <table class="table box-sm">
            <tr><td colspan="2"><h4>Master Degree Details</h4></td></tr>
            <tr><td><label>Degree</label></td><td><span id="m_degree"><?php echo $m_degree ?></span></td></tr>
            <tr><td><label>Institute</label></td><td><span id="m_institute"><?php echo $m_institute ?></span></td></tr>
            <tr><td><label>Passing year</label></td><td><span id="m_year"><?php echo $m_year ?></span></td></tr>
            <tr><td><label>CGPA/Percentage</label></td><td><span id="m_cgpa"><?php echo $m_cgpa ?></span></td></tr>
        </table>
        <table class="table box-sm" style="margin-bottom:0px;">
            <tr><td colspan="2"><h4>Bachelor Degree Details</h4></td></tr>
            <tr><td><label>Degree</label></td><td><span id="b_degree"><?php echo $b_degree ?></span></td></tr>
            <tr><td><label>Institute</label></td><td><span id="b_institute"><?php echo $b_institute ?></span></td></tr>
            <tr><td><label>Passing year</label></td><td><span id="b_year"><?php echo $b_year ?></span></td></tr>
            <tr><td><label>CGPA/Percentage</label></td><td><span id="b_cgpa"><?php echo $b_cgpa ?></span></td></tr>
        </table>
        
    </div>
    </div>
    
    <div class="container-fluid row">
    <div class="col-md-3 box" style="margin-left:80px;margin-bottom:40px;">
        <h3 class="page-header text-center">Joining Details</h3><br>
        <table class="table box-sm">
            <tr><td><label>Type of Employee</label></td><td><span id="type"><?php echo $type ?></span></td></tr>
            <tr><td><label>Joined On</label></td><td><span id="doj"><?php echo $doj ?></span></td></tr>
        </table>
    </div>

    <div class="col-md-7 box" style="margin-left:80px;margin-bottom:40px;">
        <h3 class="page-header text-center">Payment Details</h3>
        <table class="table box-sm">  
            <tr><td><label>Basic Pay</label></td><td><span id="basic"><?php echo $basic ?></span></td>
            <td><label>HRA</label></td><td><span id="hra"><?php echo $hra ?></span></td>
            <td><label>Conveyance</label></td><td><span id="conveyance"><?php echo $conveyance ?></span></td></tr>
            <tr><td><label>Medical Allowance</label></td><td><span id="medical"><?php echo $medical ?></span></td>
            <td><label>Special Allowance</label></td><td><span id="special"><?php echo $special ?></span></td>
            <td><label>Provident Fund</label></td><td><span id="provident"><?php echo $provident ?></span></td></tr>
        </table>
        
    </div>
    </div>
    
    <div class="container-fluid row">
    <div class="col-md-3 box" style="margin-left:80px;margin-bottom:40px;">
        <h3 class="page-header text-center">Bank Details</h3><br>
        <table class="table box-sm">
            <tr><td><label>Bank Name</label></td><td><span id="bankname"><?php echo $bankname ?></span></td></tr>
            <tr><td><label>Account No.</label></td><td><span id="account"><?php echo $account ?></span></td></tr>
            <tr><td><label>PAN</label></td><td><span id="pan"><?php echo $pan ?></span></td></tr>
        </table>
    </div>

    <div class="col-md-7 box" style="margin-left:80px;margin-bottom:40px;">
        <h3 class="page-header text-center">Address Details</h3>
        <table class="table box-sm">  
            <tr><td><label>Current Address</label></td><td><span id="c_address"><?php echo $c_address ?></span></td>
            <tr><td><label>Permanent Address</label></td><td><span id="p_address"><?php echo $p_address ?></span></td>
        </table>
        
    </div>
    </div>
    
</body>
</html>