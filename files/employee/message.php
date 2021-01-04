<?php

session_start();
    if(!isset($_SESSION['username'])){
        echo "<script>location.href='../../login.php'</script>";
    }
    $username = $_SESSION['username'];

    $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());

    if(isset($_POST['sendbtn'])){
        
        $sender = $username;
        $receiver = "admin";
        $message = $_POST['msgbox'];
        date_default_timezone_set('Asia/Kolkata');
        
        $query = "select pend_msg from emp_info where uname='$username'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $pend = (int)$row['pend_msg'];
        $pend++;
        $query = "update emp_info set pend_msg='$pend' where uname='$username'";
        $conn->query($query);
        
        $sender = mysqli_real_escape_string($conn,$sender);
        $receiver = mysqli_real_escape_string($conn,$receiver);
        $message = mysqli_real_escape_string($conn,$message);
        
        $result = mysqli_query($conn,"insert into msg (sender,receiver,message,seen)values ('$sender','$receiver','$message','0')") or die("Query Failed".mysqli_error($conn));
        mysqli_close($conn);
        echo "<script>location.href='message.php'</script>";
    }

?>
<!DOCTYPE html>
<html>
<head>
	<?php include("header.php"); ?>
    <style>
        body{
            margin: 0px;
            height: 100%;
            background: url("../../img/msgback2.jpg");
            background: rgba(0,0,0,0,5);
        }
        #msgframe{
            width:100%;
            height:520px;
            background: rgba(0,0,0,0.5);
        }
        #msgbox{
            width: 90%;
            border-radius:50px;
            border-style: none;
            border-bottom: 1px solid grey;
            border-left: 1px solid grey;
            resize: none;
            margin-right: 10px;
            margin-top: 5px;
            padding-left: 30px;
            height: 5em;
        }
         #sendbtn{
            width: 100px;
            height:40px;
            border-radius: 30px;
            color: white;
            font-weight: bold;
            background-color:grey;
            border:none;
        }
        #sendbtn:hover{
            background-color: green;
        }
      
        #msgbox:focus{
            
        }
        #sendbtnimg{
            width: 30px;
            height: 30px;
        }
        
    </style>
    
    <script>
    
        function decHeight(){
            var x = document.getElementById("msgframe");
            x.style.height="500px";
        }
        function incHeight(){
            var x = document.getElementById("msgframe");
            x.style.height="500px";
        }
    </script>
    
</head>
<body>
	
    <div class="container msg-field">
        <div class="row" id="msgframe" style="overflow:auto;">
            <?php include_once("show_msg.php"); ?>
            <?php 
                $query = "update msg set seen='1' where (sender='admin' and receiver='$username')";
                $conn->query($query);
            ?>
        </div>    
        <div class="row">
            <div class="col-md-12 form-inline">
                <form action="#" method="post" id="msg-form">
                    <textarea  name="msgbox" id="msgbox" placeholder="Type a message" class="form-control"  required></textarea>
                    <button type="submit" name="sendbtn"  id="sendbtn" >SEND&nbsp;&nbsp;<img src="../../img/sendbtn.png" id="sendbtnimg" /></button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<!--     <iframe  src="show_msg.php" id="msgframe" width="100%" height="520" frameborder="0"> </iframe>   -->
