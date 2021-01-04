<?php
session_start();
if(!isset($_SESSION['uname'])){
        echo "<script>location.href='../../login.php'</script>";
    }
            $uname = $_POST['ID'];
            $conn = mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
            $query = "select * from emp_info where uname='$uname'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $full_name = $row['title']." ".$row['fname']." ".$row['lname'];
                $empid = "EMP".substr($row['doj'],2,2).$row['empid']; 
                $doj = $row['doj'];
                $basic = $row['basic'];
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
            }

            $year = $_POST['year'];
            $month = $_POST['month'];
            
            $month_list = array("January","February","March","April","May","June","July","August","September","October","November","December");
            $period = $month_list[$month-1];
            $period .= " ".$year;

        
            $query = "select * from attendance where uname='$uname'";
            $result = mysqli_query($conn,$query);  
            $present = array();
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){  
                    $y = (int)substr($row['date'],0,4);
                    $m = (int)substr($row['date'],5,2);
                    $d = (int)substr($row['date'],8,2);

                    if($y==$year && $month==$m){
                        array_push($present,$d);
                    }
                }  
            }        
      
            $month_days = array("31","28","31","30","31","30","31","31","30","31","30","31");
            if($year%400==0 || ($year%4==0 && $year%100!=0))
                $month_days[2]="29";
            $tot_wrk_days = $month_days[$month-1];
            $wrk_days = count($present);
            $leaves = $tot_wrk_days-$wrk_days;

            $ctc = $basic+$hra+$provident+$medical+$conveyance+$special;







?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
    <style>
        body{
            background: url("../../img/sal1.jpg");
            background-size:cover;
            background-repeat:no-repeat;
            background-attachment: fixed;
            color:black;
        }
        h3{margin-top:2px;font-family:cursive;font-weight:bold; }
        h4{font-weight:bold;color:aliceblue;}
        th,td{text-align:left;}
        th{width:50%;color:darkorange;}
        td{width:50%;color:gold; }
        .name-plate{margin-bottom:50px;color:white;background-color:black;background:rgba(0,0,0,0.8);}
        .absent{}
        .present{background-color:green;color:white;border:2px solid black;}
        .box{background:rgba(0,0,0,0.8);border:none;border-radius:0px;}
        #generate{border-radius:0px;font-size:16px;}
        label{color: darkorange;}
    </style>
</head>
<body>
    <br>
    <div class="container"><h3><?php echo $full_name; ?></h3></div>
    
    
    <div class="container box">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr><th>Employee Id</th><td><?php echo $empid; ?></td></tr>
                    <tr><th>Username</th><td><?php echo $uname; ?></td></tr>
                    <tr><th>Joining date</th><td><?php echo $doj; ?></td></tr>
                    <tr><th>Bank name</th><td><?php echo $bankname; ?></td></tr>
                    <tr><th>Account No.</th><td><?php echo $account; ?></td></tr>
                    <tr><th>PAN No.</th><td><?php echo $pan; ?></td></tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr><th colspan="2"><h4 class="text-center"><?php echo $period ?></h4></th></tr>
                    <tr><th>Total  working days</th><td><?php echo $tot_wrk_days; ?></td></tr>
                    <tr><th>No. of working days</th><td><?php echo $wrk_days; ?></td></tr>
                    <tr><th>No. of leaves taken</th><td><?php echo $leaves  ; ?></td></tr>
                    <tr><th>Type of employee</th><td><?php echo $type; ?></td></tr>
                    <tr><th colspan="2"><h4 class="text-center">CTC per month : <?php echo $ctc.".00"; ?></h4></th></tr>
                </table>
            </div>  
        </div>
        
    </div>
    
  
    <div class="container box">
        <form action="generate_salary_slip.php" method="get" target="_blank">
        <div class="row">
            <div class="col-md-4 form-inline">
                <label>Payment mode&nbsp;&nbsp;&nbsp;</label>
                <select class="form-control" name="pay_mode">
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Direct Deposit" selected>Direct deposit</option>
                </select>
            </div>
            
            <div class="col-md-2">
                <input type="text" value="<?php echo $uname ?>" name="uname" style="display:none;">
                <input type="text" value="<?php echo $period ?>" name="period" style="display:none;">
                <input type="text" value="<?php echo $wrk_days ?>" name="wrk_days" style="display:none;">
                <input type="text" value="<?php echo $leaves ?>" name="leaves" style="display:none;">
                <button type="submit" id="generate" name="generate" class="btn btn-danger" >Generate Salary Slip</button>     
            </div>
            
        </div>
        </form>
    </div>
        
    
</body>
</html>

