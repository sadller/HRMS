<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script>
        function checkMobile(){
            var pattern = /^[0-9]+$/;   
            var x = document.getElementById("mobile").value;
            var y = document.getElementById("errmobile");
            if(x=="")   {y.innerHTML="";   x="";  return false;}
            else if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed<br>";   x="";  return false;}
            else if(x.length!=10) {y.innerHTML="*Length should be 10 <br>";   x="";  return false;}
            else{y.innerHTML=""; return true;}
        }
        
        function checkDOB(){
            var d=new Date();
                if(d.getMonth()+1 <= 9)
                    var cur=d.getYear()+1900+"-0"+(d.getMonth()+1);
                else
                    var cur=d.getYear()+1900+"-"+(d.getMonth()+1);
                if(d.getDate()<= 9)
                    var cur=d.getYear()+1900+"-0"+(d.getMonth()+1)+"-0"+d.getDate();
                else
                    var cur=d.getYear()+1900+"-"+(d.getMonth()+1)+"-"+d.getDate();

            var x = document.getElementById("dob").value;
            var y = document.getElementById("errdob");
            var cur_y = cur.split('-');
            var inp_y = x.split('-');
                cur_y = parseInt(cur_y[0]);
            var inp_d = parseInt(inp_y[2]);
            var inp_m = parseInt(inp_y[1]);
                inp_y = parseInt(inp_y[0]);

            if(x=="")   {y.innerHTML="*Invalid Date<br>";   x="";  return false;}
            else if(inp_y>cur_y || inp_y<1950 || inp_d==NaN || inp_m==NaN || inp_y==NaN) {y.innerHTML="*Invalid Year<br>";   flag=false; x="";  return false;}
            else if(isNaN(inp_d) || isNaN(inp_m) || isNaN(inp_y)) {y.innerHTML="*Invalid Date<br>";   flag=false; x="";  return false;}
            else{y.innerHTML=""; return true;}
        }

    </script>
    <style>
        .reset-pass{
            margin-top: 8%;
        }
        input[type=text],[type=date]{
            margin-bottom: 10px;
            border-radius:0px;
        }
        .box{border:1px solid lightgrey;padding:20px;border-radius:0px; }
        span{color:red;font-size:12px;}
        button{margin-top:10px;}
    </style>
</head>
<body>

    <div class="reset-pass row">
        <div class="col-md-4"></div>
        <div class="col-md-3 box">
        <form action="#" method="post">
            <h3 class="page-header">Reset Password</h3>
            <input type="text" id="id" name="id" placeholder="Username or Employee ID" class="form-control" />
            <div class="form-inline"><label>&nbsp;&nbsp;Date Of Birth&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="date" id="dob" name="dob" class="form-control" onblur="checkDOB()" /></div>
            <span id="errdob"></span>
            <input type="text" id="mobile" name="mobile" placeholder="Mobile" onkeyup="checkMobile()" class="form-control" />
            <span id="errmobile"></span>
            <div id="pass" class="box bg-success"></div>
            <button type="submit" class="btn btn-primary" name='submit'>Reset</button>
        </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    
    $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
    $empid = substr($id,5);
    $query = "select dob,mobile,doj,password from emp_info where empid='$empid'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        if($dob==$row['dob'] && $mobile==$row['mobile']){
            $cmd = "<label>PASSWORD : ". $row['password'] ."</label>";
            echo "<script>document.getElementById('pass').innerHTML='$cmd';</script>";
        }

    }
    else{
        $query = "select dob,mobile,password from emp_info where uname='$id'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            if($dob==$row['dob'] && $mobile==$row['mobile']){
                $cmd = "<label>PASSWORD : ". $row['password'] ."</label>";
                echo "<script>document.getElementById('pass').innerHTML='$cmd';</script>";
            }
        }
        else{
                $cmd = "<label>Invalid Credentials</label>";
                echo "<script>document.getElementById('pass').innerHTML='$cmd';</script>";
        }
    }
   
}


?>