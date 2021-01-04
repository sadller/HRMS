<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            background:url('img/test1.png');
            background-repeat:no-repeat;
            background-size:cover; 
        }
        #loginForm{
            margin-top:10%;
            margin-left:50px;
            border-color:black;
            background: rgba(0,0,0,0.7);
            font-family:sans-serif;
            box-sizing:border-box;
        }
        h3{
            color:aqua;
            text-align:center;
        }
        
        input[type=text],[type=password] {
            width: 100%;
            padding: 20px 10px;
            margin: 30px 0px;
            background-size:20px; 
            background-position: 10px 10px; 
            background-repeat: no-repeat;
            padding-left: 40px;
            font-size:16px; 
            border-radius:0px;
            border-color:grey;
        }
        #username{
            background-image: url('img/username1.png');
        }
        #password{
            background-image: url('img/password1.png');
        }
        .fa{
            position:relative;
            top:-63px;
            left:230px;
            font-size:20px;
            cursor:pointer;
            color:grey;
        }
        span{
            font-size:16px;
            font-weight:bold;
        }
        button[type=submit]{
            border-radius:20px;
            width:100%;
            border:1px solid green;
            margin-bottom:20px;
            padding:8px;
            color:white;
            background-color:green;
        }
        button[type=submit]:hover{
            color:blue;
            background-color:chartreuse;
        }
        p{
            color:white;
        }
        img{
            height:100px;
            width:100px;
            border-radius:200px;
            margin-left:50px;
            margin-top:10px;
            border:5px solid aqua;
        }
        a{color:white;}
        a:hover{color:aqua;}
    </style>
    
    <script>
        function togglePassword(){
            var x=document.getElementById("password");
            var e=document.getElementById("eye");
            if(x.type=="password"){
                x.type="text";
                e.style.color="dodgerblue";
            }
            else{
                x.type="password";
                e.style.color="grey";
            }
                
        }
        
      
    </script>
    
</head>
<body>
     
    <a href="index.php" ><img id="hrms" src="img/hrms2.png" /></a>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-3" id="loginForm">
                <h3 class="page-header">Login</h3>
                <form action="#" method="post"> 
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username"  autocomplete="off"/>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                    <i class="fa fa-eye" id="eye" onclick="togglePassword()"></i>
                    <?php if(isset($_GET['msg'])) echo "<p class='text-center'>".$_GET['msg']."</p><br>"; ?>
                    <center><a href="forgot_password.php">Forgot Password</a></center><br>
                    <button type="submit" id="login" name="login" ><span>LOGIN</span></button>
                </form>
            </div>
        </div>

        
    </div>
    
    
</body>
</html>


<?php
   
        if(isset($_POST['login']))
        {
            $conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
            $uname = $_POST['username'];
            $pwd = $_POST['password'];
            $query = "select * from admin where uname='$uname' && password='$pwd'";

            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){     
                session_start();
                $_SESSION['uname']=$uname;
                echo "<script>location.href='files/admin/dashboard.php'</script>";
            }
            else{
                $query = "select * from emp_info where uname='$uname' && password='$pwd'";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>0){
                    session_start();
                    $_SESSION['username']=$uname;
                    echo "<script>location.href='files/employee/dashboard.php'</script>";
                             
                }
                else{
                    header("location:login.php?msg=Invalid Credentials");
                }
            }
                
        }
?>


