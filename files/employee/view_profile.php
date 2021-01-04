<?php
session_start();
if(!isset($_SESSION['username'])){
        echo "<script>location.href='../../login.php'</script>";
    }
else{
    include("get_emp_info.php");
    $emp_id = "EMP".substr($doj,2,2).$empid;
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
    <style>
        .info h3{padding:0px;margin:5px;}
        .per_info h4{margin:5px;}
        #image{height:200px;width:190px;border-radius:200px;}
        #edit_sign{height:20px;width:20px;}
        #personal{background-color:white;}
        #education{background-color:white;}
        #join_details{background-color:white;}
        #pay_details{background-color:white;}
        #bank_details{background-color:white;}
        #address{background-color:white;}
        .nameplate{background-color:white;}
        .info{background-color:white;}
        form span{
            color:red;
        }
    </style>
    <script src="view_profile.js"></script>
    <script>
        function show_spouse(){
            var elem = document.getElementById("m_status");
            if(elem.value=="Married"){
                document.getElementById("spouse").style.display="block";
            }else{
                document.getElementById("spouse").style.display="none";
            }
        }
    
        function show_chg_pwd(){
            var elem = document.getElementById("chg_pwd");
            if(elem.style.display=="none")  elem.style.display="block";
            else    elem.style.display="none";
        }
        
        
    </script>
</head>
<body style="background-image:url(../../img/view_profile_back.jpg);">

    <br><br>
    <div class="container box info">
        <div class="row">
            <div class="col-md-3"><img src="<?php echo $image_path; ?>" id="image"/></div>
            
            <div class="col-md-6 box nameplate">
                <div class="row">
                <div class="col-md-6"><h3 class="page-header" id="name"><?php echo $fname." ".$lname?></h3></div>
                </div><br>
                <div class="row">
                <div class="col-md-6"><h3 class="page-header" id="empid"><?php echo $emp_id ?></h3></div>
                </div><br>
                <br><br>
                <div class="row">
                <div class="col-md-1"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#chngPhoto">Change Photo</button></div>
                </div>
            </div>
            <?php include_once("change_photo.php"); ?>
            <div class="col-md-3 box-sm">
                <div class="row">
                    <div class="col-md-10 form-group"><button type="button" name="chg_pwd" class="btn btn-default" onclick="show_chg_pwd()" >Change&nbsp;Password</button></div>
                </div>
                <div id="chg_pwd" style="display:none;">
                <form action="#" method="post" id="chg_pwd_form">
                    <div class="row form-group">
                    <div class="col-md-10"><input type="text" name="c_pass" class="form-control" placeholder="Current Password" /></div>
                    </div>
                    <div class="row form-group">
                    <div class="col-md-10"><input type="text" name="n_pass" class="form-control" placeholder="New Password" /></div>
                    </div>
                    <div class="row form-group">
                    <div class="col-md-10"><input type="text" name="r_pass" class="form-control" placeholder="Retype Password" /></div>
                    </div>

                    <div class="row form-group">
                    <div class="col-md-10"><button type="submit" class="btn btn-sm btn-success" name="save_pwd" >Save</button></div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    
    
    <div class="container">
        
    <div class="row">
        <div class="col-md-2"><button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#personal">Personal Information</button></div>    
        <div class="col-md-1"></div>    
        <div class="col-md-9 collapse box" id="personal">
            <!---------------------------------------------------------------------------------------------->
            <div class="row">    
            <div class="col-md-11"></div>
                <div class="col-md-1"><button type="button" class="btn" name="edit_personal" data-toggle="modal" data-target="#edit_personal"><img src="../../img/edit_sign.png" id="edit_sign"/></button></div>
                <div class="modal fade" id="edit_personal" role="dialog">
                    <div class="modal-dialog">
                        <form action="edit.php" method="POST" id="personal_form">
                            <div class="modal-content">
                                    <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Personal Information</h4>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2"><label>Mobile</label></div>
                                                <div class="col-md-8"><input type="text" class="form-control" id="mobile" name="mobile" onblur='checkMobile()' value="<?php echo $mobile ?>"></div>                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8"><span id="errmobile"></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2"><label>Email</label></div>
                                                <div class="col-md-8"><input type="email" class="form-control" id="email" name="email" onblur='checkEmail()' value="<?php echo $email ?>"></div>                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8"><span id="erremail"></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2"><label>Father's&nbsp;Name</label></div>
                                                <div class="col-md-8"><input type="text" class="form-control" id="f_name" name="f_name" onblur='checkF_name()' value="<?php echo $f_name ?>"></div>                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8"><span id="errf_name"></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
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
                                            <div class="row">
                                            <div class="col-md-2"><label>Marital&nbsp;Status</label></div>
                                            <div class="col-md-4">
                                                <?php echo $cmd; ?>   
                                            </div>                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" id="spouse" >
                                            <div class="row">
                                                <div class="col-md-2"><label>Spouse&nbsp;Name</label></div>
                                                <div class="col-md-8"><input type="text" class="form-control" id="s_name" name="s_name" onblur='checkS_name()' value='<?php echo $s_name; ?>'></div>                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8"><span id="errs_name"></span></div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                <div class="modal-footer">
                                    <input type="submit" name="submit_personal" class="btn btn-info"  value="Save Changes">
                                </div>
                            </div>
                        </form>    
                    </div>
                </div>  
            </div>
            <!-------------------------------------------------------------------------------------------->
            <h4 class="page-header">Personal Information</h4>
            <div class="box">
                <div class="row">
                <div class="col-md-4"><label>Username</label></div>
                <div class="col-md-4"><span id="uname"><?php echo $uname ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Date Of Birth</label></div>
                <div class="col-md-2"><span id="dob"><?php echo $dob ?></span></div>
                <div class="col-md-2"><label>Age</label></div>
                <div class="col-md-2"><span id="age"><?php   $diff=date_diff(date_create($dob),date_create(date("Y-m-d")));    echo $diff->format("%y years"); ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Gender</label></div>
                <div class="col-md-4"><span id="gender"><?php echo $gender ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Mobile</label></div>
                <div class="col-md-4"><span id="mobile"><?php echo $mobile ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Email</label></div>
                <div class="col-md-4"><span id="email"><?php echo $email ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Father's Name</label></div>
                <div class="col-md-4"><span id="father"><?php echo $f_name ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Marital Status</label></div>
                <div class="col-md-4"><span id="marital"><?php echo $m_status ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Spouse Name</label></div>
                <div class="col-md-4"><span id="spouse"><?php echo $s_name ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Nationality</label></div>
                <div class="col-md-4"><span id="nationality"><?php echo $nationality ?></span></div>
                </div>
            </div>
        </div>    
    </div>
    <br>
   
        
        
        
        
    <div class="row">
        <div class="col-md-2"><button type="button" class="btn btn-success btn-block" data-toggle="collapse" data-target="#education">Education</button></div>    
        <div class="col-md-1"></div>    
        <div class="col-md-9 collapse box" id="education">
            <!-------------------------------------------------------------------------------------------->
            <div class="row">
                
            <div class="col-md-11"></div>
                <div class="col-md-1"><button type="button" class="btn" data-toggle="modal" data-target="#edit_education"><img src="../../img/edit_sign.png" id="edit_sign"/></button></div>
                <div class="modal fade" id="edit_education" role="dialog">   
                    <div class="modal-dialog">
                     <form action="edit.php" method="post" id="education_form">
						<div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Education</h4>
                            </div>
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Master Degree</label></div>
                                        <div class="col-md-9"><input type="text" class="form-control" id="m_degree" name="m_degree" value='<?php echo $m_degree; ?>'></div>                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Institue Name</label></div>
                                        <div class="col-md-9"><input type="text" class="form-control" id="m_institute" name="m_institute" value='<?php echo $m_institute; ?>'></div>                
                                    </div>           
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Passing Year</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="m_year" name="m_year" onblur="checkMYear()" value='<?php echo $m_year; ?>'></div> 
                                        <div class="col-md-3 text-right"><label>CGPA</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="m_cgpa" name="m_cgpa" onblur="checkMCGPA()" value='<?php echo $m_cgpa; ?>'></div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-5"><span id="errm_year"></span></div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3"><span id="errm_cgpa"></span></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Bachelor Degree</label></div>
                                        <div class="col-md-9"><input type="text" class="form-control" id="b_degree" name="b_degree" value='<?php echo $b_degree; ?>'></div>                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Institue Name</label></div>
                                        <div class="col-md-9"><input type="text" class="form-control" id="b_institute" name="b_institute" value='<?php echo $b_institute; ?>'></div>                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Passing Year</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="b_year" name="b_year" onblur="checkBYear()" value='<?php echo $b_year; ?>'></div> 
                                        <div class="col-md-3 text-right"><label>CGPA</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="b_cgpa" name="b_cgpa" onblur="checkBCGPA()" value='<?php echo $b_cgpa; ?>'></div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-5"><span id="errb_year"></span></div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3"><span id="errb_cgpa"></span></div>
                                    </div>
                                </div>             
                  
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" name="submit_education" class="btn btn-info" >Save Changes</button>
                            </div>
                        </div>
                     
                    </form>
                    </div>
                </div>  
            </div>
            
            <!---------------------------------------------------------------------------------------------->
            
            <h4 class="page-header">Master Degree Details</h4>
            <div class="box">
                <div class="row">
                <div class="col-md-4"><label>Master Degree</label></div>
                <div class="col-md-4"><span id="m_degree"><?php echo $m_degree ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Institue Name</label></div>
                <div class="col-md-4"><span id="m_institute"><?php echo $m_institute ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-2"><label>Passing Year</label></div>
                <div class="col-md-2"><span id="m_year"><?php echo $m_year ?></span></div>
                <div class="col-md-2"><label>CGPA/Percentage</label></div>
                <div class="col-md-2"><span id="m_cgpa"><?php echo $m_cgpa ?></span></div>
                </div>
            </div>
            <h4 class="page-header">Bachelor Degree Details</h4>
            <div class="box">
                <div class="row">
                <div class="col-md-4"><label>Bachelor Degree</label></div>
                <div class="col-md-4"><span id="b_degree"><?php echo $b_degree ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Institue Name</label></div>
                <div class="col-md-4"><span id="b_institute"><?php echo $b_institute ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-2"><label>Passing Year</label></div>
                <div class="col-md-2"><span id="b_year"><?php echo $b_year ?></span></div>
                <div class="col-md-2"><label>CGPA/Percentage</label></div>
                <div class="col-md-2"><span id="b_cgpa"><?php echo $b_cgpa ?></span></div>
                </div>
            </div>
            
        </div>    
    </div>
    <br>
    
        
    <div class="row">
        <div class="col-md-2"><button type="button" class="btn btn-warning btn-block" data-toggle="collapse" data-target="#join_details">Joining Details</button></div>    
        <div class="col-md-1"></div>    
        <div class="col-md-9 collapse box" id="join_details">    
            <div class="row">     
            <div class="col-md-11"></div>
                <div class="col-md-1"><button type="button" class="btn" data-toggle="modal" data-target="#edit_join_details"><img src="../../img/edit_sign.png" id="edit_sign"/></button></div>
                <div class="modal fade" id="edit_join_details" role="dialog">
                    <div class="modal-dialog">
					<form action="edit.php" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Joining Details</h4>
                            </div>
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-4"><label>Type Of Employee</label></div>
                                    <div class="col-md-4">
                                        <?php
                                            if($type=="Permanent"){
                                                $cmd1 = "<select class='form-control' name='type'>"
                                                        ."<option value='Permanent' selected>Permanent</option>"
                                                        ."<option value='Contract'>Contract</option>"
                                                        ."</select>";
                                            }else{
                                                $cmd1 = "<select class='form-control' name='type'>"
                                                        ."<option value='Permanent'>Permanent</option>"
                                                        ."<option value='Contract' selected>Contract</option>"
                                                        ."</select>";
                                            }
                                            echo $cmd1;
                                        ?>
                                    </div>                
                                    </div>
                                </div>               
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" name="submit_joining" class="btn btn-info" >Save Changes</button>
                            </div>
                        </div>
						</form>
                    </div>
                </div>  
            </div>
            <h4 class="page-header">Joining Details</h4>
            <div class="box">
                <div class="row">
                <div class="col-md-4"><label>Type Of Employee</label></div>
                <div class="col-md-4"><span id="emp_type"><?php echo $type ?></span></div>
                </div>

                <div class="row">
                <div class="col-md-4"><label>Joined On</label></div>
                <div class="col-md-4"><span id="doj"><?php echo $doj ?></span></div>    
                </div>
            </div>
        </div>
    </div>
    <br>
        
        
    <div class="row">
        <div class="col-md-2"><button type="button" class="btn btn-danger btn-block" data-toggle="collapse" data-target="#pay_details">Payment Details</button></div>    
        <div class="col-md-1"></div>    
        <div class="col-md-9 collapse box" id="pay_details">    
            <div class="row">     
            <div class="col-md-11"></div>
                <div class="col-md-1"><button type="button" class="btn" data-toggle="modal" data-target="#edit_pay_details"><img src="../../img/edit_sign.png" id="edit_sign"/></button></div>
                <div class="modal fade" id="edit_pay_details" role="dialog">
                    <div class="modal-dialog">
					<form action="edit.php" method="post" id="payment_form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Payment Details</h4>
                            </div>
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Basic Pay</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="basic" name="basic" onblur="checkBasic()" value='<?php echo $basic; ?>'></div>                
                                        <div class="col-md-3 text-right"><label>HRA</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="hra" name="hra" onblur="checkHRA()" value='<?php echo $hra; ?>'></div>                
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-right"><span id="errbasic"></span></div>
                                        <div class="col-md-6 text-right"><span id="errhra"></span></div>
                                    </div>
                                </div>    
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Conveyance</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="conveyance" name="conveyance" onblur="checkConveyance()" value='<?php echo $conveyance; ?>'></div>                
                                        <div class="col-md-3 text-right"><label>Medical&nbsp;Allowance</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="medical" name="medical" onblur="checkMedical()" value='<?php echo $medical; ?>'></div>                
                                    </div>
                                     <div class="row">
                                        <div class="col-md-6 text-right"><span id="errconveyance"></span></div>
                                        <div class="col-md-6 text-right"><span id="errmedical"></span></div>
                                    </div>
                                </div>    
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Special&nbsp;Allowance</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="special" name="special" onblur="checkSpecial()" value='<?php echo $special; ?>'></div>                
                                        <div class="col-md-3 text-right"><label>Provident&nbsp;Fund</label></div>
                                        <div class="col-md-3"><input type="text" class="form-control" id="provident" name="provident" onblur="checkProvident()" value='<?php echo $provident; ?>'></div>                
                                    </div>
                                     <div class="row">
                                        <div class="col-md-6 text-right"><span id="errspecial"></span></div>
                                        <div class="col-md-6 text-right"><span id="errprovident"></span></div>
                                    </div>
                                </div>    
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" name="submit_payment" class="btn btn-info" >Save Changes</button>
                            </div>
                        </div>
						</form>
                    </div>
                </div>  
            </div>
            <h4 class="page-header">Payment Details</h4>
            <div class="box">
                <div class="row">
                    <div class="col-md-2"><label>Basic Pay</label></div>
                    <div class="col-md-2"><span id="basic"><?php echo $basic ?></span></div>
                    <div class="col-md-2"><label>HRA</label></div>
                    <div class="col-md-2"><span id="hra"><?php echo $hra ?></span></div>
                    <div class="col-md-2"><label>Conveyance</label></div>
                    <div class="col-md-2"><span id="conveyance"><?php echo $conveyance ?></span></div>
                </div>

                <div class="row">
                    <div class="col-md-2"><label>Medical&nbsp;Allowance</label></div>
                    <div class="col-md-2"><span id="medical"><?php echo $medical ?></span></div>
                    <div class="col-md-2"><label>Special&nbsp;Allowance</label></div>
                    <div class="col-md-2"><span id="special"><?php echo $special ?></span></div>
                    <div class="col-md-2"><label>Provident Fund</label></div>
                    <div class="col-md-2"><span id="provident"><?php echo $provident ?></span></div>
                </div>
            </div>
        </div>
    
    </div>    
    <br>
        
        
        
        
     <div class="row">
        <div class="col-md-2"><button type="button" class="btn btn-info btn-block" data-toggle="collapse" data-target="#bank_details">Bank Details</button></div>    
        <div class="col-md-1"></div>    
        <div class="col-md-9 collapse box" id="bank_details">    
            <div class="row">     
            <div class="col-md-11"></div>
                <div class="col-md-1"><button type="button" class="btn" data-toggle="modal" data-target="#edit_bank_details"><img src="../../img/edit_sign.png" id="edit_sign"/></button></div>
                <div class="modal fade" id="edit_bank_details" role="dialog">
                    <div class="modal-dialog">
					<form action="edit.php" method="post" id="bank_form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Bank Details</h4>
                            </div>
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Bank&nbsp;Name</label></div>
                                        <div class="col-md-7"><input type="text" class="form-control" id="bankname" name="bankname"  onblur="checkBankName()" value='<?php echo $bankname; ?>'></div>                
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-7"><span id="errbankname"></span></div>
                                    </div>
                                </div>    
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>Account No.</label></div>
                                        <div class="col-md-7"><input type="text" class="form-control" id="account" name="account" onblur="checkAccount()" value='<?php echo $account; ?>'></div>                
                                    </div>
                                     <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-7"><span id="erraccount"></span></div>
                                    </div>
                                </div>    
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><label>PAN</label></div>
                                        <div class="col-md-7"><input type="text" class="form-control" id="pan" name="pan" onblur="checkPAN()" value='<?php echo $pan; ?>'></div>                
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-7"><span id="errpan"></span></div>
                                    </div>
                                </div>    
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" name="submit_bank" class="btn btn-info" >Save Changes</button>
                            </div>
                        </div>
						</form>
                    </div>
                </div>  
            </div>
            <h4 class="page-header">Bank Details</h4>
            <div class="box">
                <div class="row">
                    <div class="col-md-2"><label>Bank Name</label></div>
                    <div class="col-md-6"><span id="bankname"><?php echo $bankname ?></span></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><label>Account&nbsp;No.</label></div>
                    <div class="col-md-2"><span id="account"><?php echo $account ?></span></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><label>PAN</label></div>
                    <div class="col-md-2"><span id="pan"><?php echo $pan ?></span></div>
                </div>  
            </div>
        </div>
    
    </div>   
    <br>
        
        
        
        
    <div class="row">
        <div class="col-md-2"><button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#address">Address</button></div>    
        <div class="col-md-1"></div>    
        <div class="col-md-9 collapse box" id="address">    
            <div class="row">     
            <div class="col-md-11"></div>
                <div class="col-md-1"><button type="button" class="btn" data-toggle="modal" data-target="#edit_address"><img src="../../img/edit_sign.png" id="edit_sign"/></button></div>
                <div class="modal fade" id="edit_address" role="dialog">
                    <div class="modal-dialog">
					<form action="edit.php" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Address</h4>
                            </div>
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-2"><label>Present</label></div>
                                    <div class="col-md-7"><textarea class="form-control" id="c_address" name="c_address"><?php echo $c_address; ?></textarea></div>                
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-2"><label>Permanent</label></div>
                                    <div class="col-md-7"><textarea class="form-control" id="p_address" name="p_address"><?php echo $p_address; ?></textarea></div>                
                                    </div>
                                </div>                 
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" name="submit_address" class="btn btn-info">Save Changes</button>
                            </div>
                        </div>
						</form>
                    </div>
                </div>  
            </div>
            <h4 class="page-header">Address Details</h4>
            <div class="box">
                <div class="row">
                    <div class="col-md-2"><label>Present</label></div>
                    <div class="col-md-6"><span id="c_address"><?php echo $c_address ?></span></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><label>Permanent</label></div>
                    <div class="col-md-6"><span id="p_address"><?php echo $p_address ?></span></div>
                </div>
            </div>
        </div>
    
    </div>   
        
   
        </div>
    <br><br>
</body>
</html>






<?php

if(isset($_POST['save_pwd'])){
    $c_pass = $_POST['c_pass'];
    $n_pass = $_POST['n_pass'];
    $r_pass = $_POST['r_pass'];
   
    if($n_pass!=$r_pass){
         echo "<script>alert('Password mismatch');</script>";
    }
    else if($password !=$c_pass){
        echo "<script>alert('Wrong pasword');</script>";
    }else{
        $password =$n_pass;
        $user = $uname ;
        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
        $query = "update emp_info set password='$n_pass' where uname='$user'";
        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Password updated successfully');</script>";
        } else {
            echo "<script>alert('Some error occured');</script>" . $conn->error;
        }
    }
}

?>