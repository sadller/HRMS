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
        body{
            background: url("../../img/pic4.jpg");
            background-size:cover;
            background-repeat:no-repeat;
            color:black;
            overflow-x: hidden;
        }
        th{
            font-weight: bold;
            background-color:crimson;
        }
        td{
            font-size:16px;
            color:white;
            background-color:beige;
            background: rgba(0,0,0,0.7);
        }
        tr:hover{background-color:black;}
        .user-icon{
            height:50px;
            width: 50px;
            border-radius:50px;
        }
        select{color:black;}
        button[type=submit]{width:80px;}
    </style>
</head>
<body id="back">
    <div style="text-align:center">
        <h3 >Attandance</h3>
    </div>
    
    
    
    <table class="table table-striped" style="width:100%;"> 
        <thead>
            <tr>
                <th style="width:5%;"><h4 >Emp Id</h4></th>
                <th style="width:5%;"><h4 >Photo</h4></th>
                <th style="width:10%;"><h4 >Full Name</h4></th>
                <th style="width:10%;"><h4 >Username</h4></th>
                <th style="width:10%;"><h4 >DOJ</h4></th>
                <th style="width:6%;"><h4 >Year</h4></th>
                <th style="width:6%;"><h4 >Month</h4></th>
                <th style="width:10%;"><h4 class='text-center'>Action</h4></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
                $query = "select * from emp_info";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $jyr = (int)substr($row['doj'],0,4);
                        $cyr = (int)substr(date("Y-m-d"),0,4);
                        
                        $cmd = "<tr><form action='show_attendance.php' method='post'><input type='text' style='display:none;' name='ID' value=".$row['uname']."><tr><td>"."EMP".substr($row['doj'],2,2).$row['empid']."</td><td><img class='user-icon' src='photos/".$row['photo']."'</td><td>".
                            $row['fname']." ".$row['lname']."</td><td>".
                            $row['uname']."</td><td>".$row['doj']."</td><td><select name='year' class='form-control'>";
                        $i=$jyr;
                        while($i<=$cyr){
                            $cmd .= "<option value='".$i."'>".$i."</option>";
                            $i++;
                        }
                        $cmd .= "</select></td>";
                                
                        $cmd .= "<td><select name='month' class='form-control'>
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
                                </select></td>";
                                
                        $cmd .= "<td><center><button type='submit' class='btn btn-success' name='go'>GO</button></center></td></form></tr>";
                        echo $cmd;
                    }
                }
                else{
                    echo "<tr><td colspan='8' class='box-sm'><h4 class='page-header'>No Employee Found</h4></td></tr>";
                }
                $conn->close();
            ?>
        </tbody>
    </table>
    
</body>
</html>

