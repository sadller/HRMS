
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="HRMS";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        die("connection failed".mysqli_connect_error());
    }

?>

 <table class="table table-striped" style="width:100%;"> 
            <thead>
            <tr>
                <th style="width:15%;"><h4 class="page-header">Type</h4></th>
                <th style="width:15%;"><h4 class="page-header">Start Date</h4></th>
                <th style="width:15%;"><h4 class="page-header">End Date</h4></th>
                <th style="width:40%;"><h4 class="page-header">Reason</h4></th>
                <th style="width:15%;"><h4 class="page-header">Status</h4></th>
            </tr>
            </thead>
            <tbody>

<?php
                    
                    if(isset($_POST['pending'])){
                        $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
                        $query = "select * from emp_leave where status='pending'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row['type']."</td><td>".$row['start']."</td><td>".
                                        $row['end']."</td><td>".$row['reason']."</td><td>".$row['status']."</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    }
                ?>  
                
        </tbody>
         </table>