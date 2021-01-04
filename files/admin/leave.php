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
            background: url("../../img/leave.jpg");
            background-size:cover;
            background-repeat:no-repeat;
            background-attachment: fixed;
            background-position:center;
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
            background: rgba(0,0,0,0.8);
        }
        h3{color:darkorange; }
        .status{color:white;}
    </style>
</head>
<body>
    
    <div style="text-align:center;">
        <h3 >Leave Management</h3>
    </div>
    
    

    <form action="#" method="post">
        <button type="submit" class="btn btn-primary" data-toggle="collapse" data-target="#pending" name="pending">Pending</button>
        <button type="submit" class="btn btn-success" data-toggle="collapse" data-target="#approved" name="approved">Approved</button>
        <button type="submit" class="btn btn-danger"  data-toggle="collapse" data-target="#denied" name="denied">Denied</button>
        <button type="submit" class="btn btn-warning"    data-toggle="collapse" data-target="#cancelled" name="cancelled">Cancelled</button>
    </form>
    <?php
        if(isset($_POST['pending'])){
            echo "<center><h4 class='status'>Pending Leaves</h4></center>";
        }
        if(isset($_POST['approved'])){
            echo "<center><h4 class='status'>Approved Leaves</h4></center>";
        }
        if(isset($_POST['denied'])){
            echo "<center><h4 class='status'>Denied Leaves</h4></center>";
        }
        if(isset($_POST['cancelled'])){
            echo "<center><h4 class='status'>Cancelled Leaves</h4></center>";
        }

    ?>
    <br>

    <table class="table table-hover" style="width:100%;"> 
        <thead>
            <tr>
                <th style="width:10%;"><h4>Username</h4></th>
                <th style="width:10%;"><h4 >Leave ID</h4></th>
                <th style="width:10%;"><h4 >Type</h4></th>
                <th style="width:15%;"><h4 >Start Date</h4></th>
                <th style="width:15%;"><h4 >End Date</h4></th>
                <th style="width:25%;"><h4 >Reason</h4></th>
                <th style="width:15%;"><h4 >Status</h4></th>
                <th style="width:20%;"><h4 >Action</h4></th>
            </tr>
        </thead>
        <tbody>
            <?php
                    
                    if(isset($_POST['pending'])){
                        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
                        $query = "select * from emp_leave where status='Pending'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><form action='#' method='post'><input type='text' style='display:none;' name='ID' value=".$row['leave_id']."><td>"
                                        .$row['uname']."</td><td>".$row['leave_id']."</td><td>".$row['type']."</td><td>".$row['start']."</td><td>".
                                        $row['end']."</td><td>".$row['reason']."</td><td>".$row['status']."</td><td>".
                                        "<button type='submit' class='btn btn-block btn-xs btn-success' name='_approved'>Approve</button>
                                         <button type='submit' class='btn btn-block btn-xs btn-danger' name='_denied'>Deny</button>"."</td></form></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center' class='box-sm'><h4 >No Pending Leave Found</h4></td></tr>";
                        }
                        $conn->close();
                    }
            
                    if(isset($_POST['approved'])){
                        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
                        $query = "select * from emp_leave where status='Approved'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><form action='#' method='post'><input type='text' style='display:none;' name='ID' value=".$row['leave_id']."><td>"
                                        .$row['uname']."</td><td>".$row['leave_id']."</td><td>".$row['type']."</td><td>".$row['start']."</td><td>".
                                        $row['end']."</td><td>".$row['reason']."</td><td>".$row['status']."</td><td>".
                                        "<button type='submit' class='btn btn-block btn-xs btn-primary' name='_pending'>Pending</button>
                                         <button type='submit' class='btn btn-block btn-xs btn-danger' name='_denied'>Deny</button>"."</td></form></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center' class='box-sm'><h4 >No Approved Leave Found</h4></td></tr>";
                        }
                        $conn->close();
                    }
            
                    if(isset($_POST['denied'])){
                        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
                        $query = "select * from emp_leave where status='Denied'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><form action='#' method='post'><input type='text' style='display:none;' name='ID' value=".$row['leave_id']."><td>"
                                        .$row['uname']."</td><td>".$row['leave_id']."</td><td>".$row['type']."</td><td>".$row['start']."</td><td>".
                                        $row['end']."</td><td>".$row['reason']."</td><td>".$row['status']."</td><td>".
                                        "<button type='submit' class='btn btn-block btn-xs btn-primary' name='_pending'>Pending</button>
                                         <button type='submit' class='btn btn-block btn-xs btn-success' name='_approved'>Approve</button>"."</td></form></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center' class='box-sm'><h4 >No Denied Leave Found</h4></td></tr>";
                        }
                        $conn->close();
                    }
            
                    if(isset($_POST['cancelled'])){
                        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
                        $query = "select * from emp_leave where status='cancelled'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row['uname']."</td><td>".$row['leave_id']."</td><td>".$row['type']."</td><td>".$row['start']."</td><td>".
                                        $row['end']."</td><td>".$row['reason']."</td><td>".$row['status']."</td><td></td></tr>";
                
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center' class='box-sm'><h4 >No Cancelled Leave Found</h4></td></tr>";
                        }
                        $conn->close();
                    }
            
                ?>  
                
        </tbody>
    </table>
    
    
</body>
</html>


<?php

    if(isset($_POST['_pending'])){
        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
        $ID= $_POST['ID'];
        $query = "update emp_leave set status='Pending' where leave_id='$ID'";
        if ($conn->query($query) === TRUE) {
            //echo "<script>alert('pending');</script>";
        } else {
            echo "<script>alert('NOT pending');</script>" . $conn->error;
        }  
        $conn->close();
    }
    
    if(isset($_POST['_approved'])){
        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
        $ID= $_POST['ID'];
        $query = "update emp_leave set status='Approved' where leave_id='$ID'";
        if ($conn->query($query) === TRUE) {
            //echo "<script>alert('Approved');</script>";
        } else {
            echo "<script>alert('NOT Approved');</script>" . $conn->error;
        }  
        $conn->close();
    }

    if(isset($_POST['_denied'])){
        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
        $ID= $_POST['ID'];
        $query = "update emp_leave set status='Denied' where leave_id='$ID'";
        if ($conn->query($query) === TRUE) {
            //echo "<script>alert('Denied');</script>";
        } else {
            echo "<script>alert('NOT Denied');</script>" . $conn->error;
        }  
        $conn->close();
    }

?>