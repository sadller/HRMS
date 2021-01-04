<?php
session_start();
if(!isset($_SESSION['uname'])){
        echo "<script>location.href='../../login.php'</script>";
    }
    include_once("add_emp_validate.php");

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <?php include("header.php"); ?>
        <style>
            body {
                background: url("../../img/.jpg");
                background-size: cover;
                background-repeat: repeat-y;
                background-attachment: fixed;
                color: black;
            }

            .box {background: rgba(0, 0, 0, 0.1);}

            .add_employee_form span {color: red;}

            p { color: red; }

            .box {
                border: 1px solid lightgrey;
                padding: 20px;
                border-radius: 5px;
            }

            .box-sm {
                border: 1px solid lightgrey;
                padding: 5px;
                border-radius: 5px;
                background-color: white;
            }

        </style>
        <script src="add_employee.js"></script>
        <script>
            function checkUserName() {
                var x = document.getElementById('uname').value;
                if (x != "") {
                    document.getElementById('uname').style.background = "url(../../img/checking.gif) no-repeat";
                    document.getElementById('uname').style.backgroundSize = "25px 25px";
                    document.getElementById('uname').style.backgroundPosition = "right";
                    var ajx = new XMLHttpRequest();
                    ajx.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {

                            if (this.responseText == "too short") {
                                document.getElementById('uname').style.background = "url(../../img/error.gif) no-repeat";
                                document.getElementById('uname').style.backgroundSize = "25px 25px";
                                document.getElementById('uname').style.backgroundPosition = "right";
                                document.getElementById('uname').title = "Lenght of uname should be between 3 to 16";
                            } else if (this.responseText == "not alphanumeric") {
                                document.getElementById('uname').style.background = "url(../../img/error.gif) no-repeat";
                                document.getElementById('uname').style.backgroundSize = "25px 25px";
                                document.getElementById('uname').style.backgroundPosition = "right";
                                document.getElementById('uname').title = "uname should be alphanumeric";
                            } else if (this.responseText == "username taken") {
                                document.getElementById('uname').style.background = "url(../../img/error.gif) no-repeat";
                                document.getElementById('uname').style.backgroundSize = "25px 25px";
                                document.getElementById('uname').style.backgroundPosition = "right";
                                document.getElementById('uname').title = "This uname is already taken (Try another one)";
                            } else if (this.responseText == "ok") {
                                document.getElementById('uname').style.background = "url(../../img/ok.gif) no-repeat";
                                document.getElementById('uname').style.backgroundSize = "25px 25px";
                                document.getElementById('uname').style.backgroundPosition = "right";
                                document.getElementById('uname').title = "uname accepted";
                            }
                        }
                    }
                    ajx.open("POST", "checkExistingUser.php", true);
                    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    ajx.send("checkuname=" + x);
                } else {
                    document.getElementById('uname').style.background = "none";
                }
            }

        </script>
    </head>

    <body>



        <div style="text-align:center">
            <h3 class="page-header">Let's Welcome a new Member</h3>
        </div>
        <br><br>

        <div class="container add_employee_form">
            <form action="#" method="POST" enctype="multipart/form-data" id="add_emp_form">
                <h4 class="page-header">Personal Details</h4>
                <div class="box">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 form-inline">
                                <label for="title">Title&nbsp;</label>
                                <select class="form-control" name="title" id="title">
                        <option value="Mr." selected>Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                      </select>
                            </div>

                            <div class="col-md-1"><label for="fname">First&nbsp;Name<span>&#42;</span></label></div>
                            <div class="col-md-3"><input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname"  title="Only alphabet" onkeyup="checkFName()" autocomplete="off" value="<?php echo isset($_POST['fname'])?$_POST['fname']:'' ?>"></div>
                            <div class="col-md-2 text-right"><label for="lname">&nbsp;&nbsp;Last&nbsp;Name<span>&#42;</span></label></div>
                            <div class="col-md-3"><input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" pattern=[A-Za-z]{2,30} title="Only alphabet" onkeyup="checkLName()" autocomplete="off" value="<?php echo isset($_POST['lname'])?$_POST['lname']:'' ?>"></div>

                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <p id="errfname"></p>
                                <p class="error">
                                    <?php if(isset($errors['fname1'])) echo $errors['fname1']; ?>
                                </p>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <p id="errlname"></p>
                                <p class="error">
                                    <?php if(isset($errors['lname1'])) echo $errors['lname1']; 
                                          if(isset($errors['lname2'])) echo $errors['lname2'];   ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1"><label for="uname">Username<span>&#42;</span></label></div>
                            <div class="col-md-5">
                                <input type="text" class="form-control has-success" id="uname" placeholder="Enter username" name="uname" onkeyup="checkUserName()" autocomplete="off"></div>
                            <div class="col-md-2 text-right"><label for="photo">&nbsp;&nbsp;Photo</label></div>
                            <div class="col-md-3"><input type="file" class="form-control" id="photo" name="photo" /></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <p id="erruname"></p>
                                <p class="error">
                                    <?php if(isset($errors['uname'])) echo $errors['uname']; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1"><label for="mobile">Mobile<span>&#42;</span></label></div>
                            <div class="col-md-5"><input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" pattern=[0-9]{10} name="mobile" onkeyup="checkMobile()" autocomplete="off" value="<?php echo isset($_POST['mobile'])?$_POST['mobile']:'' ?>"></div>
                            <div class="col-md-2 text-right"><label for="dob">&nbsp;&nbsp;Date&nbsp;of&nbsp;Birth<span>&#42;</span></label></div>
                            <div class="col-md-3"><input type="date" class="form-control" id="dob" name="dob" onblur="checkDOB()" autocomplete="off" value="<?php echo isset($_POST['dob'])?$_POST['dob']:'' ?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <p id="errmobile"></p>
                                <p class="error">
                                    <?php if(isset($errors['mobile1'])) echo $errors['mobile1']; 
                                          if(isset($errors['mobile2'])) echo $errors['mobile2'];   ?>
                                </p>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <p id="errdob"></p>
                                <p class="error">
                                    <?php if(isset($errors['dob1'])) echo $errors['dob1']; 
                                          if(isset($errors['dob2'])) echo $errors['dob2'];   ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1"><label for="email">Email<span>&#42;</span></label></div>
                            <div class="col-md-5"><input type="email" class="form-control" id="email" placeholder="Enter email address" name="email" onkeyup="checkEmail()" autocomplete="off" value="<?php echo isset($_POST['email'])?$_POST['email']:'' ?>"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-1"><label for="nationality">Nationality</label></div>
                            <div class="col-md-2">
                                <input list="country_list" name="nationality" id="nationality" class="form-control" onchange="checkNationality()" value="<?php echo isset($_POST['nationality'])?$_POST['nationality']:'' ?>">
                                <datalist id="country_list">
                        <?php   include("country_list.php"); ?>
                        </datalist>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <p id="erremail"></p>
                                <p class="error">
                                    <?php if(isset($errors['email1'])) echo $errors['email1']; 
                                          if(isset($errors['email2'])) echo $errors['email2'];   ?>
                                </p>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <p id="errnationality"></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1"><label for="address">Address&nbsp;</label></div>
                            <div class="col-md-5">
                                <textarea class="form-control" id="p_address" name="p_address" row="4" placeholder="Enter permanent address"></textarea></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <table id="gender">
                                    <tr>
                                        <th style="padding-top:10px;"><label>&nbsp;&nbsp;Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></th>
                                        <td><label class="radio radio-inline"><input type="radio" name="gender" value="male" checked/>Male&nbsp;&nbsp;</label></td>
                                        <td><label class="radio radio-inline"><input type="radio" name="gender" value="female"/>Female</label></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="page-header">Employment Details</h4>

                <div class="box">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1"><label for="empid">Employee&nbsp;ID&nbsp;</label></div>
                            <div class="col-md-3"><input type="text" class="form-control" id="empid" name="empid" value="EMP####" disabled /></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-2 text-right"><label for="doj">Date&nbsp;of&nbsp;Joining<span>&#42;</span></label></div>
                            <div class="col-md-2"><input type="date" class="form-control" id="doj" name="doj" onblur="checkDOJ()" autocomplete="off" value="<?php echo isset($_POST['doj'])?$_POST['doj']:'' ?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <p id="errdoj"></p>
                                <p class="error">
                                    <?php if(isset($errors['doj1'])) echo $errors['doj1']; 
                                          if(isset($errors['doj2'])) echo $errors['doj2'];   ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <div class="row">
                            <div class="col-md-7"></div>
                            <div class="col-md-2  text-right"><label for="type">Type&nbsp;of&nbsp;Employee</label></div>
                            <div class="col-md-2">
                                <select class="form-control" name="type">
							<option value="Permanent">Permanent</option>
							<option value="Contract">Contract</option>
						</select>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="page-header">Salary Details</h4>

                <div class="box">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"><label for="basic">Basic&nbsp;Salary<span>&#42;</span></label></div>
                            <div class="col-md-2"><input type="text" class="form-control" id="basic" name="basic" pattern=[0-9]{1,7} onkeyup="checkBasic()" autocomplete="off" value="<?php echo isset($_POST['basic'])?$_POST['basic']:'' ?>"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-1 text-right"><label for="hra">HRA</label></div>
                            <div class="col-md-2"><input type="text" class="form-control" id="hra" name="hra" pattern=[0-9]{1,7} onkeyup="checkHRA()" value="<?php echo isset($_POST['hra'])?$_POST['hra']:'' ?>"></div>
                            <div class="col-md-2 text-right"><label for="conveyance">Conveyance</label></div>
                            <div class="col-md-2"><input type="text" class="form-control" id="conveyance" name="conveyance" pattern=[0-9]{1,7} onkeyup="checkConveyance()" value="<?php echo isset($_POST['conveyance'])?$_POST['conveyance']:'' ?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <p id="errbasic"></p>
                                <p class="error">
                                    <?php if(isset($errors['basic1'])) echo $errors['basic1']; 
                                          if(isset($errors['basic2'])) echo $errors['basic2'];   ?>
                                </p>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <p id="errhra"></p>
                                <?php if(isset($errors['hra1'])) echo $errors['hra1'];  ?>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3 text-right">
                                <p id="errconveyance"></p>
                                <?php if(isset($errors['conveyance1'])) echo $errors['conveyance1'];  ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"><label for="medicalAllowance">Medical&nbsp;Allowance&nbsp;</label></div>
                            <div class="col-md-2"><input type="text" class="form-control" id="medical" name="medical" pattern=[0-9]{1,7} onkeyup="checkMedical()" value="<?php echo isset($_POST['medical'])?$_POST['medical']:'' ?>"></div>
                            <div class="col-md-2 text-right"><label for="specialAllowance">Special&nbsp;Allowance&nbsp;</label></div>
                            <div class="col-md-2"><input type="text" class="form-control" id="special" name="special" pattern=[0-9]{1,7} onkeyup="checkSpecial()" value="<?php echo isset($_POST['special'])?$_POST['special']:'' ?>"></div>
                            <div class="col-md-2 text-right"><label for="providentfund">Provident&nbsp;Fund&nbsp;</label></div>
                            <div class="col-md-2"><input type="text" class="form-control" id="provident" name="provident" pattern=[0-9]{1,7} onkeyup="checkProvident()" value="<?php echo isset($_POST['provident'])?$_POST['provident']:'' ?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <p id="errmedical"></p>
                                <?php if(isset($errors['medical1'])) echo $errors['medical1'];  ?>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <p id="errspecial"></p>
                                <?php if(isset($errors['special1'])) echo $errors['special1'];  ?>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3 text-right">
                                <p id="errprovident"></p>
                                <?php if(isset($errors['provident1'])) echo $errors['provident1'];  ?>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="page-header">Bank Details</h4>

                <div class="box">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"><label for="bankname">Bank&nbsp;Name<span>&#42;</span></label></div>
                            <div class="col-md-6"><input type="text" class="form-control" placeholder="Enter Bank Name" id="bankname" pattern=[a-zA-Z]{2,40} name="bankname" onkeyup="checkBankName()" autocomplete="off" value="<?php echo isset($_POST['bankname'])?$_POST['bankname']:'' ?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <p id="errbankname"></p>
                                <p class="error">
                                    <?php if(isset($errors['bankname1'])) echo $errors['bankname1']; 
                                          if(isset($errors['bankname2'])) echo $errors['bankname2'];   ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"><label for="account">Account&nbsp;Number<span>&#42;</span></label></div>
                            <div class="col-md-4"><input type="text" class="form-control" placeholder="Enter Account Number" pattern=[0-9]{10,16} id="account" name="account" onkeyup="checkAccount()" autocomplete="off" value="<?php echo isset($_POST['account'])?$_POST['account']:'' ?>"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-1 text-right"><label for="pan">PAN&nbsp;</label></div>
                            <div class="col-md-4"><input type="text" class="form-control" placeholder="Enter PAN" pattern=[0-9a-zA-Z]{10} id="pan" name="pan" onkeyup="checkPAN()" value="<?php echo isset($_POST['pan'])?$_POST['pan']:'' ?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <p id="erraccount"></p>
                                <p class="error">
                                    <?php if(isset($errors['account1'])) echo $errors['account1']; 
                                          if(isset($errors['account2'])) echo $errors['account2'];   ?>
                                </p>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <p id="errpan"></p>
                                <p class="error">
                                    <?php if(isset($errors['pan1'])) echo $errors['pan1'];  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <button class="btn btn-success btn-lg btn-outline-* btn-block" id="submit" name="submit">Save&nbsp;Employee</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>

    </html>



    <?php

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $photo = $uname;
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    $p_address = $_POST['p_address'];
    $gender = $_POST['gender'];
    $doj = $_POST['doj'];
    $type = $_POST['type'];
    $basic = $_POST['basic'];
    $hra = $_POST['hra'];
    $conveyance = $_POST['conveyance'];
    $medical = $_POST['medical'];
    $special = $_POST['special'];
    $provident = $_POST['provident'];
    $bankname = $_POST['bankname'];
    $account = $_POST['account'];
    $pan = $_POST['pan'];
    $target = "images/".basename($_FILES['photo']['name']);

    $conn = mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die($conn);

    $title = mysqli_real_escape_string($conn,$title);
    $fname = mysqli_real_escape_string($conn,$fname);
    $lname = mysqli_real_escape_string($conn,$lname);
    $uname = mysqli_real_escape_string($conn,$uname);
    $mobile = mysqli_real_escape_string($conn,$mobile);
    $dob = mysqli_real_escape_string($conn,$dob);
    $email = mysqli_real_escape_string($conn,$email);
    $nationality = mysqli_real_escape_string($conn,$nationality);
    $p_address = mysqli_real_escape_string($conn,$p_address);
    $gender = mysqli_real_escape_string($conn,$gender);
    $doj = mysqli_real_escape_string($conn,$doj);
    $type = mysqli_real_escape_string($conn,$type);
    $basic = mysqli_real_escape_string($conn,$basic);
    $hra = mysqli_real_escape_string($conn,$hra);
    $conveyance = mysqli_real_escape_string($conn,$conveyance);
    $medical = mysqli_real_escape_string($conn,$medical);
    $special = mysqli_real_escape_string($conn,$special);
    $provident = mysqli_real_escape_string($conn,$provident);
    $bankname = mysqli_real_escape_string($conn,$bankname);
    $account = mysqli_real_escape_string($conn,$account);
    $pan = mysqli_real_escape_string($conn,$pan);

    include_once("check_unique.php");
    
    $photo = basename($_FILES['photo']['name']);
    $imageFileType = strtolower(pathinfo($photo,PATHINFO_EXTENSION));
    $photo_name = $uname.".".$imageFileType;
    //include_once("upload_photo.php");
    //$result = mysqli_query($conn,"insert into emp_info values ('','$title','$fname','$lname','$uname','$uname','$photo_name','$mobile','$dob','$email','$nationality','$p_address','$p_address','$gender','$doj','$type','$basic','$hra','$conveyance','$medical','$special','$provident','$bankname','$account','$pan','','','','','','','','','','','',0)") or die("Query Failed".mysqli_error($conn)); 
    echo "<script>alert('Employee data successfully added.');</script>";
    //echo "<script>location.href='dashboard.php';</script>";
}
?>
