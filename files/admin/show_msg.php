<?php
                    if(isset($_POST['_view'])){
                        $user = $_POST['ID'];
                        $query = "update msg set seen='1' where sender='$user'";
                        $conn->query($query);
                        
                        $query = "update emp_info set pend_msg='0' where uname='$user'";
                        $conn->query($query);
  
                        $query = "select * from msg where (sender='$user' or receiver='$user')";
                        $result = mysqli_query($conn,$query);
                        $prev_dt="000000000000000";
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                
                                $msg = $row['message'];
                                $next_dt  = $row['datetime'];
                                if($row['seen']=="1")
                                    $seen="seen";
                                else
                                    $seen="";
                                
                                if(substr($next_dt,0,10)!=substr($prev_dt,0,10)){
                                    $dt = substr($next_dt,8,2)."-".substr($next_dt,5,2)."-".substr($next_dt,0,4);
                                    $cmd = "<div class='row'>
                                                <div class='col-md-5'></div>
                                                <div class='col-md-2 text-center box-xs middle'>
                                                    <p>".substr($dt,0,10)."</p>   
                                                </div>
                                            </div>";
                                    echo $cmd;
                                }
                                if($row['sender']==$user){
                                    $cmd = "<div class='row'>
                                                <div class='col-md-5 box-sm left'>
                                                    <p>".$msg."</p>
                                                    <p class='time'>".substr($next_dt,10,6)."</p>
                                                </div>
                                            </div>";
                                    echo $cmd;
                                }
                                else{ 
                                    $cmd = "<div class='row'>
                                                <div class='col-md-7'></div>
                                                <div class='col-md-5 text-right box-sm right'>
                                                    <p>".$msg."</p>
                                                    <p class='time'>".substr($next_dt,10,6)."&nbsp;&nbsp;".$seen."</p>
                                                </div>
                                            </div>";
                                    echo $cmd;
                                }
                                $prev_dt = $next_dt;
                            }
                            echo "<div id='end'></div><script>document.getElementById('end').scrollIntoView();</script>";
                        }
                        else{
                            $cmd = "<div class='row text-center box'>
                                        <p>Start Conversation</p></div>";
                            echo $cmd;
                        }
                    }  
?>

