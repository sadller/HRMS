<?php

session_start();
    if(!isset($_SESSION['uname'])){
        echo "<script>location.href='../../login.php'</script>";
    }
    $username = $_SESSION['uname'];
    $conn = mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
    <script>
        function getMsgBox(){
            if(document.getElementById('_ID').value.length>20){
                document.getElementById("msgbox").style.display="none";
                document.getElementById("sendbtn").style.display="none";
            }
            else{
                document.getElementById('msgbox').style.display="initial";
                document.getElementById('sendbtn').style.display="initial";
            }
        }
    </script>
    <style>
        
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: blue; 
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #b30000; 
        }
        body{
            margin: 0px;
            height: 100%;
            background: url("../../img/msgback5.jpg");
            background-size: cover;
            background-attachment: fixed;
            background: rgba(0,0,0,0,5);
        }
        #search_user{
            width: 100%;
            margin: 0px;
            height:40px;
            font-size: 16px;
            padding-left:10px;
            color:white;
            background-color:crimson;
        }
        #user-section{
            overflow: auto;
            overflow-x: hidden;
            margin: 0px;
            padding: 0px;
            height: 570px;
        }
        #msg-section{
            background:rgba(0,0,0,0.5);
            overflow: auto;
            height:500px;
            padding-left: 100px;
            padding-right: 100px;
        }
        #msgbox{
            width: 87%;
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
        
        .right{background-color: forestgreen;color:white;}
        .left{background-color:blueviolet;color:white;}
        .middle{background-color:crimson;color:aliceblue;}
        .time{font-size:10px;color:black;font-weight:bold;text-align:right;}
        .box{padding:20px;border-radius:0px;background-color:brown;color:white;}
        .box-sm{padding:0px 20px;margin-top:5px;margin-bottom:5px;border-radius:0px;border-style:none;}
        .box-xs{padding:0px 0px;margin-top:5px;margin-bottom:5px;border-radius:0px;}
    </style>
</head>
<body style="overflow:hidden;" onload="getMsgBox()">
    
    <div class="container">

        <div class="row">
            <div class="col-md-3" id="user-section">
                
                 <?php include_once("user_list.php"); ?>            
            </div>
            
            <div class="col-md-9">
                <div class="row" id="msg-section">
                    <?php include_once("show_msg.php"); ?>
                </div>
                <div class="row form-inline">
                    <form action="#" method="post" id="msg-form" >
                        <input type='text' name='_ID' id='_ID' style="display:none;"  value="<?php echo $_POST['ID']; ?>" />
                     
                        <textarea  name="msgbox" id="msgbox"  placeholder="Type a message" class="form-control"  required ></textarea>
                        <button type="submit" name="sendbtn"  id="sendbtn" >SEND&nbsp;&nbsp;<img src="../../img/sendbtn.png" id="sendbtnimg" /></button>
                    </form>
                </div>             
            </div>
        </div>
    
    </div>
    
    
</body>
</html>


<?php

    if(isset($_POST['sendbtn'])){
        
        $sender = $username;
        $receiver = $_POST['_ID'];
        $message = $_POST['msgbox'];
        date_default_timezone_set('Asia/Kolkata');
        
        $sender = mysqli_real_escape_string($conn,$sender);
        $receiver = mysqli_real_escape_string($conn,$receiver);
        $message = mysqli_real_escape_string($conn,$message);
        
        $result = mysqli_query($conn,"insert into msg (sender,receiver,message,seen)values ('$sender','$receiver','$message','0')") or die("Query Failed".mysqli_error($conn));
        mysqli_close($conn);
        echo "<script>document.getElementById('$receiver').click();</script>";
    }
?>