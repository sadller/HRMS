<?php
       
        
if(isset($_POST['_save'])){
    

    $errors = array(); 
    
    if(empty($_POST['uname']))
        $errors['uname']="Username cannot be empty.";
    if(!preg_match("/^[a-zA-Z0-9]*$/",$_POST['uname']))
        $errors['uname']="Only letters and digits allowed.";
    if(strlen($_POST['uname'])<3)
        $errors['uname']="Username must have atleast 3 chars.";
    
    
    
    if(empty($_POST['mobile']))
        $errors['mobile']="Mobile cannot be empty.";
    if(!preg_match("/^[0-9]*$/",$_POST['mobile']))
        $errors['mobile']="Only digits allowed.";
        

    
    if(empty($_POST['dob']))
        $errors['dob']="DOB cannot be empty.";
    if(!preg_match("/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/",$_POST['dob']))
        $errors['dob']="Invalid Date.";
    $y = (int)substr($_POST['dob'],0,4);
    $m = (int)substr($_POST['dob'],5,2);
    $d = (int)substr($_POST['dob'],8,2);
    if($y<1950 || $y>date("Y"))
        $errors['dob']="Invalid Year[1950-present].";
    
    
    
    if(empty($_POST['email']))
        $errors['email']="Email cannot be empty.";
    if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$_POST['email']))
        $errors['email']="Invalid email.";
    if(strlen($_POST['email'])>35)
        $errors['email']="Max 35 characters";
        
        
        
    if(empty($_POST['nationality']))
        $errors['nationality']="Invalid.";
        
        
        
    
    if(empty($_POST['doj']))
        $errors['doj']="DOJ cannot be empty.";
    if(!preg_match("/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/",$_POST['doj']))
        $errors['doj']="Invalid Date.";
    $y = (int)substr($_POST['dob'],0,4);
    $m = (int)substr($_POST['dob'],5,2);
    $d = (int)substr($_POST['dob'],8,2);
    if($y<1990)
        $errors['dob']="Must be joined after 1990.";
        
        
    
    if(empty($_POST['basic']))
        $errors['basic']="Basic salary cannot be empty.";
    if(!preg_match("/^[0-9]*$/",$_POST['basic']))
        $errors['basic']="Invalid salary.";
    if(strlen($_POST['basic'])>7)
        $errors['basic']="Value exceeded.";
    
    
    
    
    if(!preg_match("/^[0-9]*$/",$_POST['hra']))
        $errors['hra']="Invalid salary.";
    if(strlen($_POST['hra'])>7)
        $errors['hra']="Value exceeded";
    
    
    
    if(!preg_match("/^[0-9]*$/",$_POST['conveyance']))
        $errors['conveyance']="Invalid salary.";
    if(strlen($_POST['conveyance'])>7)
        $errors['conveyance']="Value exceeded";
    
    
    
    
    if(!preg_match("/^[0-9]*$/",$_POST['special']))
        $errors['special']="Invalid salary.";
    if(strlen($_POST['special'])>7)
        $errors['special']="Value exceeded";
    
    
    
    
    if(!preg_match("/^[0-9]*$/",$_POST['medical']))
        $errors['medical']="Invalid salary.";
    if(strlen($_POST['medical'])>7)
        $errors['medical']="Value exceeded";
    
    
    
    if(!preg_match("/^[0-9]*$/",$_POST['provident']))
        $errors['provident']="Invalid salary.";
    if(strlen($_POST['provident'])>7)
        $errors['provident']="Value exceeded";
    
        
    
    
    if(empty($_POST['bankname']))
        $errors['bankname']="Bankname cannot be empty.";
    if(!preg_match("/^[a-zA-Z -,]+$/",$_POST['bankname']))
        $errors['bankname']="Only letters and -, allowed.";
    if(strlen($_POST['bankname'])>50)
        $errors['bankname']="Bankname too long.";
    
    
    if(empty($_POST['account']))
        $errors['account']="Account must be filled.";
    if(!preg_match("/^[0-9]*$/",$_POST['account']))
        $errors['account']="Invalid Account No.";
    if(strlen($_POST['account'])<10 || strlen($_POST['account'])>16)
        $errors['account']="Invalid Account No.";
    
    
    if(empty($_POST['pan']))
        $errors['pan']="PAN must be filled.";
    if(!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}$/",$_POST['pan']))
        $errors['pan']="Invalid PAN.";
    if(strlen($_POST['pan'])!=10)
        $errors['pan']="Invalid PAN No.";
    
    
    
    if(!preg_match("/^[0-9]*$/",$_POST['m_year']))
        $errors['m_year']="Invalid year.";
    if(!empty($_POST['m_year']) && (strlen($_POST['m_year'])>4 || $_POST['m_year']<1900))
        $errors['m_year']="Invalid year";
    
    
    
    
    if(!preg_match("/^[0-9]*$/",$_POST['b_year']))
        $errors['b_year']="Invalid year.";
    if(!empty($_POST['b_year']) && (strlen($_POST['b_year'])>4 || $_POST['b_year']<1900))
        $errors['b_year']="Invalid year";
    
    
    $flag=0;
    if($_POST['m_cgpa']!=""){
        if(preg_match("/[%]/",$_POST['m_cgpa']))
            $errors['m_cgpa']="Invalid cgpa";
        if(preg_match("/^([0-9]){1,2}$/",$_POST['m_cgpa']) )   
            $flag=1;
        if(preg_match("/^([0-9]){1,2}([.]){1}([0-9]){1,2}$/",$_POST['m_cgpa']) )   
            $flag=1;
        if($flag!=1)
            $errors['m_cgpa']="Invalid cgpa";
    }
        



    if($_POST['b_cgpa']!=""){
        if(preg_match("/[%]/",$_POST['b_cgpa']))
            $errors['b_cgpa']="Invalid cgpa";
        if(!preg_match("/^([0-9]){1,2}$/",$_POST['b_cgpa']) )   
            $flag=1;
        if(!preg_match("/^([0-9]){1,2}([.]){1}([0-9]){1,2}$/",$_POST['b_cgpa']) )   
            $flag=1;
        if($flag!=1)
            $errors['b_cgpa']="Invalid cgpa";
    }
    
    
    
    
    if(!preg_match("/^[a-zA-Z ]*$/",$_POST['f_name']))
        $errors['f_name']="Only letters and spaces allowed.";
    if(strlen($_POST['f_name'])>30)
        $errors['f_name']="Father's name too long.";
    
    
    
    if(!preg_match("/^[a-zA-Z ]*$/",$_POST['s_name']))
        $errors['s_name']="Only letters and spaces allowed.";
    if(strlen($_POST['s_name'])>30)
        $errors['s_name']="Father's name too long.";
    
        
}

?>
