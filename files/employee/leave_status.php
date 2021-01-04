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
            background: url("../../img/b3.jpg");
            background-size:cover;
            background-repeat:no-repeat;
            color:black;
        }
        th{
            font-weight: bold;
            background-color:darkorange;
        }
        td{
            font-size:16px;
            color:white;
            background-color:beige;
            background: rgba(0,0,0,0.7);
        }
    </style>
</head>
<body>
    <div style="text-align:center">
    <h3 style="color:white;">Leave Status</h3>
    </div>
    
    <table class="table " style="width:100%;"> 
        <thead>
        <tr>
            <th style="width:10%;"><h4>Leave Id</h4></th>
            <th style="width:15%;"><h4 >Type</h4></th>
            <th style="width:15%;"><h4 >Start Date</h4></th>
            <th style="width:15%;"><h4 >End Date</h4></th>
            <th style="width:35%;"><h4 >Reason</h4></th>
            <th style="width:10%;"><h4 >Status</h4></th>
            <th style="width:10%;"><h4 >Action</h4></th>
        </tr>
        </thead>
        <tbody>
        <?php

            $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
            $username = $_SESSION['username'];
            $query = "select * from emp_leave where uname='$username'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $cmd = "<tr><form action='#' method='post'><input type='text' style='display:none;' name='ID' value=".$row['leave_id']."><td>"
                            .$row['leave_id']."</td><td>".$row['type']."</td><td>".$row['start']."</td><td>".
                            $row['end']."</td><td>".$row['reason']."</td><td>".$row['status']."</td>";
                    if($row['status']=="Cancelled")
                        $cmd = $cmd."<td><button type='submit' name='_reapply' class='btn btn-primary btn-block btn-sm'>Reapply</button>"."</td></form></tr>";
                    else 
                        $cmd = $cmd."<td><button type='submit' name='_cancel' class='btn btn-danger btn-block btn-sm'>Cancel</button>"."</td></form></tr>";            
                    echo $cmd;
                }
            } else {
                echo "0 results";
            }
            $conn->close();

        ?>
        </tbody>
    </table>
    
   
    
</body>
</html>


<?php
    if(isset($_POST['_cancel'])){
        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
        $ID= $_POST['ID'];
        $query = "update emp_leave set status='Cancelled' where leave_id='$ID'";
        if ($conn->query($query) === TRUE) {
            //echo "<script>alert('cancelled');</script>";
            echo "<script>location.href='leave_status.php'</script>";
        } else {
            echo "<script>alert('NOT cancelled');</script>" . $conn->error;
        }  
        $conn->close();
    }

    if(isset($_POST['_reapply'])){
        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
        $ID= $_POST['ID'];
        $query = "update emp_leave set status='Pending' where leave_id='$ID'";
        if ($conn->query($query) === TRUE) {
            //echo "<script>alert('cancelled');</script>";
            echo "<script>location.href='leave_status.php'</script>";
        } else {
            echo "<script>alert('Some error occured');</script>" . $conn->error;
        }  
        $conn->close();
    }

?>