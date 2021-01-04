<?php
session_start();
if(!isset($_SESSION['username'])){
        echo "<script>location.href='../../login.php'</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
    
    <style>
        body{
            background: url("../../img/b4.jpg");
            background-size:cover;
            background-repeat:no-repeat;
            color:black;
        }
        .content{
            background: rgba(0,0,0,0.5);
        }
        
        #days{margin:0px;text-align:center;}
    </style>
    <script>
        
        var d=new Date();
        if(d.getMonth()+1 <= 9)
			var n=d.getYear()+1900+"-0"+(d.getMonth()+1);
		else
			var n=d.getYear()+1900+"-"+(d.getMonth()+1);
        if(d.getDate()<= 9)
			var n=d.getYear()+1900+"-0"+(d.getMonth()+1)+"-0"+d.getDate();
		else
			var n=d.getYear()+1900+"-"+(d.getMonth()+1)+"-"+d.getDate();
        
        function setmin1(){
				document.getElementById("start").setAttribute("min",n);     
			}
        function setmin2(){	
				var m=document.getElementById("start").value;
				document.getElementById("end").setAttribute("min",m);
			}
        function countDays(){
				var x = document.getElementById("days");
				var dt1 = new Date(document.getElementById("start").value);
				var dt2 = new Date(document.getElementById("end").value);
				var diff = Math.floor((Date.UTC(dt2.getFullYear(),dt2.getMonth(),dt2.getDate())-(Date.UTC(dt1.getFullYear(),dt1.getMonth(),dt1.getDate() )))/(24*60*60*1000));
				diff++;
                if(diff<0 || diff===NaN)  diff=0;
                document.getElementById("days").innerHTML=diff;
		   } 
    </script>
</head>
<body>
    <div style="text-align:center">
    <h3 class="page-header">Apply For Leave</h3>
    </div>
    
    <div class="container box content">
    <form action="#" method="post">
        <div class="row">
            <div class="col-md-1"></div>    
            <div class="col-md-2"><label>Leave Type</label></div>
            <div class="col-md-2 form-group">
                <select class="form-control" name="type">
                <option value="sick">Sick Leave</option>
                <option value="vacation">Vacation Leave</option>
                </select>
            </div>               
            <div class="col-md-2 text-right"><label>Total Days</label></div>      
        </div>

        <div class="row">
            <div class="col-md-1"></div>  
            <div class="col-md-2"><label>Leave Start Date</label></div>  
            <div class="col-md-2 form-group"><input type="date" class="form-control"  id="start" name="start" onclick="setmin1()" /></div>
            <div class="col-md-1"></div>
            <div class="col-md-1 box"><h3 id="days"></h3></div>  
        </div>         

        <div class="row">
            <div class="col-md-1"></div>  
            <div class="col-md-2"><label>Leave End Date</label></div>  
            <div class="col-md-2 form-group"><input type="date" class="form-control" id="end" name="end" onclick="setmin2()" onchange="countDays()" /></div>
        </div> 

        <div class="row">
            <div class="col-md-1"></div>  
            <div class="col-md-1"><label>Reason</label></div>  
            <div class="col-md-3 form-group"><textarea class="form-control" id="reason" name="reason" rows="3"></textarea></div>
            <div class="col-md-1"></div>
            <div class="col-md-1 form-group"><button type="submit" name="apply" class="btn btn-block btn-success">Apply</button></div>
        </div>        
    </form>
    </div>
</body>
</html>

<?php

    if(isset($_POST['apply'])){
        $type = $_POST['type'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $reason = $_POST['reason'];
        $status = "Pending";
        $uname = $_SESSION['username'];
        
        $errors = array();
        if(empty($start))
            $errors['start']="Etart date cannot be empty.";
        if(!preg_match("/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/",$start))
            $errors['start']="Invalid leave start Date.";
        if(empty($end))
            $errors['end']="End date cannot be empty.";
        if(!preg_match("/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/",$start))
            $errors['end']="Invalid leave end Date.";
        
        if(count($errors)==0){
            $conn = mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die($conn);

            $type = mysqli_real_escape_string($conn,$type);
            $start = mysqli_real_escape_string($conn,$start);
            $end = mysqli_real_escape_string($conn,$end);
            $reason = mysqli_real_escape_string($conn,$reason);
            $status = mysqli_real_escape_string($conn,$status);
            $uname = mysqli_real_escape_string($conn,$uname);

            $result = mysqli_query($conn,"insert into emp_leave values ('','$uname','$type','$start','$end','$reason','$status')") or die("Query Failed".mysqli_error($conn));
            mysqli_close($conn);
            echo "<script>location.href='dashboard.php'</script>";
        }
        else{
            print_r($errors);
            echo "<script>alert('Incorrect input');</script>";
            echo "<script>location.href='leave_apply.php'</script>";
        }
    }

?>