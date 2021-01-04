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
            background: url("../../img/b10.jpg");
            background-size:cover;
            background-repeat:no-repeat;
            background-attachment: fixed;
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
        tr:hover{background-color:black;}
        button{
            width:80px;
        }
         .user-icon{
            height:50px;
            width: 50px;
            border-radius:50px;
        }
    </style>
</head>
<body id="back">
    <div style="text-align:center">
        <h3 >Let's Make Some Changes...</h3>
    </div>
    
    
    
    <table class="table table-striped" style="width:100%;"> 
        <thead>
            <tr>
                <th style="width:10%;"><h4 >Photo</h4></th>
                <th style="width:10%;"><h4 >Emp Id</h4></th>
                <th style="width:15%;"><h4 >Name</h4></th>
                <th style="width:10%;"><h4 >Username</h4></th>
                <th style="width:10%;"><h4 >DOJ</h4></th>
                <th style="width:10%;"><h4 >Mobile</h4></th>
                <th style="width:10%;"><h4 >Action</h4></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
                $query = "select * from emp_info";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><form action='edit_record.php' method='post'><input type='text' style='display:none;' name='ID' value=".$row['uname']."><tr><td><img class='user-icon' src='photos/".$row['photo']."'</td><td>"."EMP".substr($row['doj'],2,2).$row['empid']."</td><td>".
                            $row['fname']." ".$row['lname']."</td><td>".
                            $row['uname']."</td><td>".$row['doj']."</td><td>".$row['mobile']."</td><td>".
                            "<button type='submit' class='btn btn-warning' name='_edit'>Edit</button></td></form></tr>";
                    }
                }
                else{
                    echo "<tr><td colspan='7' class='box-sm'><h4 class='page-header'>No Employee Found</h4></td></tr>";
                }
                $conn->close();
            ?>
        </tbody>
    </table>
    
</body>
</html>

