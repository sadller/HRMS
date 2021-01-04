<?php
    if(!isset($_SESSION['username'])){
            echo "<script>location.href='../../login.php'</script>";
        }
    $username = $_SESSION['username'];
    $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
    $query = "select * from msg where (sender='$username' or receiver='$username')";
    $result = mysqli_query($conn,$query);
    echo "<div class='container-fluid'>";
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
                $cmd = "<div class='row'>
                            <div class='col-md-5'></div>
                            <div class='col-md-1 text-center box-xs middle'>
                                <p>".substr($next_dt,0,10)."</p>   
                            </div>
                        </div>";
                echo $cmd;
            }
            if($row['sender']==$username){
                $cmd = "<div class='row'>
                            <div class='col-md-6'></div>
                            <div class='col-md-5 box-sm right text-right'>
                                <p>".$msg."</p>
                                <p class='time'>".substr($next_dt,10,6)."&nbsp;&nbsp;".$seen."</p>
                            </div>
                        </div>";
                echo $cmd;
            }
            else{
                $cmd = "<div class='row'>
                            <div class='col-md-5 box-sm left'>
                                <p>".$msg."</p>
                                <p class='time'>".substr($next_dt,10,6)."</p>
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
    echo "</div>";

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        .box{padding:20px;border-radius:0px;background-color:brown;color:white;}
        .box-sm{padding:0px 20px;margin-top:5px;margin-bottom:5px;border-radius:0px;border-style:none;}
        .box-xs{padding:0px 0px;margin-top:5px;margin-bottom:5px;border-radius:0px;border-style:none;}
        .right{background-color: forestgreen;color:white;}
        .left{background-color:blueviolet;color:white;margin-left: 50px;}
        .middle{background-color:crimson;color:aliceblue;margin-left: 30px;}
        .time{font-size:10px;color:black;font-weight:bold;text-align:right;}
        p{padding:0px;margin:0px;}
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

    </style>
</head>
<body>
	
	
</body>
</html>