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
            }
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
    <style>
        body{
            background: url("../../img/pic1.jpeg");
            background-size:cover;
            background-repeat:no-repeat;
            background-attachment: fixed;
            color:white;
        }
        h3{margin-top:2px;}
        #attendance-table{background: rgba(0,0,0,0.8);}
        th{text-align: center;height:50px;width:50px;border:1px solid grey;font-size:20px;}
        .name-plate{margin-bottom:50px;color:white;background-color:black;background:rgba(0,0,0,0.8);}
        .absent{}
        .present{background-color:green;color:white;border:2px solid black;}
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row">
           <div class="col-md-4"></div>
           <div class="col-md-5"></div>
            <div class="col-md-3 name-plate">
                <h3><?php echo $full_name; ?></h3>
                <h3><?php echo $uname; ?></h3>
                <h3><?php echo $empid; ?></h3>
            </div>
        </div>
    </div>
    
    <div class="container" id='attendance-table'>
        
        <?php
            $year = $_POST['year'];
            $month = $_POST['month'];
            
            $cmd1 = "<h3 class='page-header'>";
            $month_list = array("January","February","March","April","May","June","July","August","September","October","November","December");
            $cmd1 .= $month_list[$month-1];
            $cmd1 .= " ".$year."</h3>";
            echo $cmd1;
        
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
            $cmd = "<table class='table'><tr>";
            $i=1;
        
            for($i=1;$i<=31;$i++){
                if(in_array($i,$present)){
                    $cmd .= "<th class='present'>".$i."</th>";
                }
                else{
                    $cmd .= "<th class='absent'>".$i."</th>";
                }
                if($i%7==0)
                    $cmd .= "</tr><tr>";
            }
        
        
            $cmd .= "</tr></table>";
            echo $cmd;
        
            $cmd2 = "<h4>Total Present Days : ".count($present)."</h4>";
            echo $cmd2;
        
        ?>
    </div>
</body>
</html>

