<?php
	if(isset($_POST['getUsers']))
	{
		$conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
		$users = $_POST['getUsers']; 
        if($users==""){ 
            $query = "SELECT * from emp_info";
        }
        else{
            $users .= "%";
		    $query = "SELECT * from emp_info WHERE uname like '$users' ";
        }
		$result = mysqli_query($conn,$query);
		
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $image_path="photos/".$row['photo'];
                if($row['pend_msg']>0)
                    $pend_msg="(".$row['pend_msg'].")";
                else
                    $pend_msg="";
                $cmd =  "<form action='#' method='post'>
                        <input type='text' name='ID' id='ID' style='display:none;' value='".$row['uname']."' />
                        <button type='submit' name='_view' class='user-btn' id='".$row['uname']."' >
                            <table>
                                <tr><td rowspan='2' class='user-icon'><img src='".$image_path."'></td><td colspan='2'><h3>".$row['fname']." ".$row['lname']."</h3></td></tr>
                                <tr><td class='user-name'>".$row['uname']."</td><td class='msg-notf'>".$pend_msg."</td></tr>
                            </table>
                        </button>
                        </form>";

                echo $cmd;
            }
        }
	    else{
            echo "";	
        }    
	}
?>