<?php
session_start();
if(!isset($_SESSION['username'])){
        echo "<script>location.href='../../login.php'</script>";
    }
include_once("get_emp_info.php");

;    if(isset($_GET['go'])){
            $year = $_GET['year'];
            $month = $_GET['month'];

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
        
          
    }
?>




<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
    <style>
        body{
            background: url("../../img/sal.png");
            background-size:cover;
            background-repeat:no-repeat;
            background-attachment: fixed;
            color:black;
        }   
        th{color:darkgoldenrod;}
        td{color:white;}
        .box{background:rgba(0,0,0,0.7);}
        .period{color:aqua;font-size:25px;font-weight:bold;font-family: cursive;} 
        .box{border:none;border-radius:0px;}
    </style>
    
    <script>
    function showSalary(){
        var x = document.getElementById("salary").style.display="initial";
    }
    </script>
    
</head>
<body>
    
    <div class="container box">
        <div class="row">
            
            <div class="col-md-2 ">
                <br><br>
                <form action="#" method="get">
                    <label>Year</label><br>
                    <?php
                        $jyr = (int)substr($doj,0,4);
                        $cyr = (int)substr(date("Y-m-d"),0,4);
                        $cmd = "<select name='year' class='form-control'>";
                        $i=$jyr;
                        while($i<=$cyr){
                            $cmd .= "<option value='".$i."'>".$i."</option>";
                            $i++;
                        }
                        $cmd .= "</select>";
                        echo $cmd;
                    ?>
                    <br><br>
                    <label>Month</label><br>
                    <?php
                        $cmd = "<select name='month' class='form-control'>
                                <option value='1'>Jan</option>
                                <option value='2'>Feb</option>
                                <option value='3'>Mar</option>
                                <option value='4'>Apr</option>
                                <option value='5'>May</option>
                                <option value='6'>Jun</option>
                                <option value='7'>Jul</option>
                                <option value='8'>Aug</option>
                                <option value='9'>Sep</option>
                                <option value='10'>Oct</option>
                                <option value='11'>Nov</option>
                                <option value='12'>Dec</option>
                                </select>";
                        echo $cmd;   
                    ?>   
                    <br><br><br>
                    <button type="submit" id="go" name="go" class="btn btn-primary btn-block" >SHOW</button>

                </form>
            </div>
            
            <div class="col-md-10 box" id="salary">
            
                <table class="table">
                    <tr><th>Employee ID</th><td><?php echo $empid; ?></td><th>Username</th><td><?php echo $uname; ?></td></tr>
                    <tr><th>Joining Date</th><td><?php echo $doj; ?></td><th>Bank Name</th><td><?php echo $bankname; ?></td></tr>
                    <tr><th>Account No.</th><td><?php echo $account; ?></td><th>PAN No.</th><td><?php echo $pan; ?></td></tr>
                </table>
            
                <table class="table">
                    <tr><th colspan="2"><h4 class="text-center period box"><?php echo $period ?></h4></th></tr>
                    <tr><th>Total  working days</th><td><?php echo $tot_wrk_days; ?></td></tr>
                    <tr><th>No. of working days</th><td><?php echo $wrk_days; ?></td></tr>
                    <tr><th>No. of leaves taken</th><td><?php echo $leaves  ; ?></td></tr>
                    <tr><th>Type of employee</th><td><?php echo $type; ?></td></tr>
                    <tr><th colspan="2"><h4 class="text-center">CTC per month : <?php echo $ctc.".00"; ?></h4></th></tr>
                </table>
                
                <form action="generate_salary_slip.php" method="get" target="_blank">
                    <input type="text" value="<?php echo $uname ?>" name="uname" style="display:none;">
                    <input type="text" value="<?php echo $period ?>" name="period" style="display:none;">
                    <input type="text" value="<?php echo $wrk_days ?>" name="wrk_days" style="display:none;">
                    <input type="text" value="<?php echo $leaves ?>" name="leaves" style="display:none;">
                    <button type="submit" id="generate" name="generate" class="btn btn-danger btn-block" >Generate Salary Slip</button>
                </form> 
                
            </div>

        </div>
    </div>
    

        

    
</body>
</html>


<?php
if(!isset($period)){
    echo "<script>document.getElementById('salary').style.display='none';</script>";
}
?>