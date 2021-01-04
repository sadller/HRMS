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
            #photo {
                height: 200px;
                width: 190px;
                border-radius: 100px;
            }

            #back {
                background-image: url('../../img/edit2.jpg');
                background-size: cover;
                background-attachment: fixed;
                color: white;
                background-position: top;
                overflow-x: hidden;
            }

            form span {
                color: red;
            }

            h3 {
                color: black;
                font-weight: bold;
            }

            label {
                color: white;
            }

            .box {
                background: rgba(0, 0, 0, 0.5);
                border: none;
            }

            .box-sm {
                background: rgba(0, 0, 0, 0.7);
                border: none;
            }

        </style>
        <script src="edit_record.js"></script>
        <script>
            function show_spouse() {
                var elem = document.getElementById("m_status");
                if (elem.value == "Married") {
                    document.getElementById("spouse").style.display = "contents";

                } else {
                    document.getElementById("spouse").style.display = "none";
                    document.getElementById("s_name").value = "";
                }
            }

        </script>
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
        $conn->close();
    ?>

            <form action="update.php" id="edit_form" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 box text-center"><img src="<?php echo $image_path; ?>" id="photo" /></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="row">
                                <h3 class="page-header">
                                    <?php echo $title." ".$fname." ".$lname ?>
                                </h3>
                            </div>
                            <div class="row">
                                <h3>
                                    <?php echo "EMP".substr($doj,2,2).$empid ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>


                <div class="container-fluid row">

                    <div class="col-md-5" style="margin-left:80px;">
                        <br>
                        <table class="table box-sm">
                            <tr>
                                <td><label>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                                <td><input type='text' name='password' class='form-control' onkeyup="checkPassword()" value='<?php echo $password; ?>'></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span id="errpassword"></span></td>
                            </tr>
                        </table>
                        <br><br>
                        <div class="box">
                            <h3 class="page-header text-center">Personal Information</h3><br>
                            <table class="table box-sm">
                                <tr style="display:none;">
                                    <td colspan="2"><input type='text' name='uname' value='<?php echo $uname ?>'></td>
                                </tr>
                                <tr>
                                    <td><label>Username</label></td>
                                    <td><input type='text' class='form-control' disabled value='<?php echo $uname ?>'></td>
                                </tr>
                                <tr>
                                    <td><label>Date of Birth</label></td>
                                    <td><input type='date' name='dob' class='form-control' onkeyup="checkDOB()" value='<?php echo $dob ?>'></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span id="errdob"></span></td>
                                </tr>
                                <tr>
                                    <td><label>Mobile</label></td>
                                    <td><input type='text' name='mobile' class='form-control' onkeyup='checkMobile()' value='<?php echo $mobile ?>'></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span id="errmobile"></span></td>
                                </tr>
                                <tr>
                                    <td><label>Email</label></td>
                                    <td><input type='email' name='email' class='form-control' onkeyup='checkEmail()' value='<?php echo $email ?>'></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span id="erremail"></span></td>
                                </tr>
                                <tr>
                                    <td><label>Father's Name</label></td>
                                    <td><input type='text' name='f_name' class='form-control' onkeyup='checkF_name()' value='<?php echo $f_name ?>'></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span id="errf_name"></span></td>
                                </tr>
                                <?php
                    $cmd = "<select class='form-control' name='m_status' id='m_status' onchange='show_spouse()'>";
                    $cmd = $cmd."<option value='Single' ";
                    if($m_status=="Single")
                        $cmd=$cmd."selected";
                    $cmd = $cmd.">Single</option>"; 
                    $cmd = $cmd."<option value='Married' ";
                    if($m_status=="Married")
                        $cmd=$cmd."selected";
                    $cmd = $cmd.">Married</option>";                                                        
                    $cmd = $cmd."<option value='Programmer' ";
                    if($m_status=="Programmer")
                        $cmd=$cmd."selected";
                    $cmd = $cmd.">Programmer</option>";
                    $cmd = $cmd."</select>";
            ?>

                                    <tr>
                                        <td><label>Marital Status</label></td>
                                        <td>
                                            <?php echo $cmd; ?>
                                        </td>
                                    </tr>
                                    <tr id="spouse" style='display:none;'>
                                        <td><label>Spouse Name</label></td>
                                        <td><input type='text' name='s_name' id="s_name" class='form-control' value='<?php echo $s_name ?>'></td>
                                    </tr>
                                    <tr>
                                        <td><label>Nationality</label></td>
                                        <td><input type='text' name='nationality' class='form-control' value='<?php echo $nationality ?>'></td>
                                    </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-5 box" style="margin-left:80px;margin-bottom:40px;">
                        <h3 class="page-header text-center">Education Details</h3>
                        <table class="table box-sm">
                            <tr>
                                <td colspan="2">
                                    <h4>Master Degree Details</h4>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Degree</label></td>
                                <td><input type='text' name='m_degree' class='form-control' value='<?php echo $m_degree ?>'></td>
                            </tr>
                            <tr>
                                <td><label>Institute</label></td>
                                <td><input type='text' name='m_institute' class='form-control' value='<?php echo $m_institute ?>'></td>
                            </tr>
                            <tr>
                                <td><label>Passing year</label></td>
                                <td><input type='text' name='m_year' class='form-control' onkeyup="checkMYear()" value='<?php echo $m_year ?>'></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span id="errm_year"></span></td>
                            </tr>
                            <tr>
                                <td><label>CGPA/Percentage</label></td>
                                <td><input type='text' name='m_cgpa' class='form-control' onkeyup="checkMCGPA()" value='<?php echo $m_cgpa ?>'></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span id="errm_cgpa"></span></td>
                            </tr>
                        </table>
                        <table class="table box-sm" style="margin-bottom:0px;">
                            <tr>
                                <td colspan="2">
                                    <h4>Bachelor Degree Details</h4>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Degree</label></td>
                                <td><input type='text' name='b_degree' class='form-control' value='<?php echo $b_degree ?>'></td>
                            </tr>
                            <tr>
                                <td><label>Institute</label></td>
                                <td><input type='text' name='b_institute' class='form-control' value='<?php echo $b_institute ?>'></td>
                            </tr>
                            <tr>
                                <td><label>Passing year</label></td>
                                <td><input type='text' name='b_year' class='form-control' onkeyup="checkBYear()" value='<?php echo $b_year ?>'></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span id="errb_year"></span></td>
                            </tr>
                            <tr>
                                <td><label>CGPA/Percentage</label></td>
                                <td><input type='text' name='b_cgpa' class='form-control' onkeyup="checkBCGPA()" value='<?php echo $b_cgpa ?>'></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span id="errb_cgpa"></span></td>
                            </tr>
                        </table>

                    </div>
                </div>

                <div class="container-fluid row">
                    <div class="col-md-3 box" style="margin-left:80px;margin-bottom:40px;">
                        <h3 class="page-header text-center">Joining Details</h3><br>
                        <table class="table box-sm">
                            <?php
                if($type=="Permanent"){
                    $cmd = "<select class='form-control' name='type'>"
                            ."<option value='Permanent' selected>Permanent</option>"
                            ."<option value='Contract'>Contract</option>"
                            ."</select>";
                }else{
                    $cmd = "<select class='form-control' name='type'>"
                            ."<option value='Permanent'>Permanent</option>"
                            ."<option value='Contract' selected>Contract</option>"
                            ."</select>";
                }
                            ?>
                                <tr>
                                    <td><label>Type of Employee</label></td>
                                    <td>
                                        <?php echo $cmd; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Joined On</label></td>
                                    <td><input type='date' name='doj' class='form-control' onkeyup='checkDOJ()' value='<?php echo $doj ?>'></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right"><span id="errdoj"></span></td>
                        </table>
                    </div>

                    <div class="col-md-7 box" style="margin-left:80px;margin-bottom:40px;">
                        <h3 class="page-header text-center">Payment Details</h3>
                        <table class="table box-sm">
                            <tr>
                                <td><label>Basic Pay</label></td>
                                <td><input type='text' name='basic' class='form-control' onkeyup='checkBasic()' value='<?php echo $basic ?>'></td>
                                <td><label>HRA</label></td>
                                <td><input type='text' name='hra' class='form-control' onkeyup='checkHRA()' value='<?php echo $hra ?>'></td>
                                <td><label>Conveyance</label></td>
                                <td><input type='text' name='conveyance' class='form-control' onkeyup='checkConveyance()' value='<?php echo $conveyance ?>'></td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-right"><span id="errbasic"></span></td>
                                <td colspan="2" class="text-right"><span id="errhra"></span></td>
                                <td colspan="2" class="text-right"><span id="errconveyance"></span></td>
                            </tr>

                            <tr>
                                <td><label>Medical Allowance</label></td>
                                <td><input type='text' name='medical' class='form-control' onkeyup='checkMedical()' value='<?php echo $medical ?>'></td>
                                <td><label>Special Allowance</label></td>
                                <td><input type='text' name='special' class='form-control' onkeyup='checkSpecial()' value='<?php echo $special ?>'></td>
                                <td><label>Provident Fund</label></td>
                                <td><input type='text' name='provident' class='form-control' onkeyup='checkProvident()' value='<?php echo $provident ?>'></td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-right"><span id="errmedical"></span></td>
                                <td colspan="2" class="text-right"><span id="errspecial"></span></td>
                                <td colspan="2" class="text-right"><span id="errprovident"></span></td>
                            </tr>

                        </table>

                    </div>
                </div>

                <div class="container-fluid row">
                    <div class="col-md-3 box" style="margin-left:80px;margin-bottom:40px;">
                        <h3 class="page-header text-center">Bank Details</h3><br>
                        <table class="table box-sm">
                            <tr>
                                <td><label>Bank Name</label></td>
                                <td><input type='text' name='bankname' class='form-control' onkeyup="checkBankName()" value='<?php echo $bankname ?>'></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"><span id="errbankname"></span></td>
                            </tr>
                            <tr>
                                <td><label>Account No.</label></td>
                                <td><input type='text' name='account' class='form-control' onkeyup="checkAccount()" value='<?php echo $account ?>'></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"><span id="erraccount"></span></td>
                            </tr>
                            <tr>
                                <td><label>PAN</label></td>
                                <td><input type='text' name='pan' class='form-control' onkeyup="checkPAN()" value='<?php echo $pan ?>'></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"><span id="errpan"></span></td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-7 box" style="margin-left:80px;margin-bottom:40px;">
                        <h3 class="page-header text-center">Address Details</h3>
                        <table class="table box-sm">
                            <tr>
                                <td><label>Current Address</label></td>
                                <td><textarea name='c_address' class='form-control' rows="3"><?php echo $c_address ?></textarea></td>
                                <tr>
                                    <td><label>Permanent Address</label></td>
                                    <td><textarea type='text' name='p_address' class='form-control' rows="3"><?php echo $p_address ?></textarea></td>
                        </table>

                    </div>
                </div>

                <div class="container text-center">
                    <button type="submit" class="btn btn-success btn-lg" name="_save">Save Changes</button>
                </div><br><br>
            </form>
    </body>

    </html>
