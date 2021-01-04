<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <style>
        .heading{background-color:crimson;}
        .box{border:1px solid lightgrey;padding:20px;border-radius:5px; }
        .box-sm{border:1px solid lightgrey;padding:5px;border-radius:5px;}
    </style>
</head>
<body>
    
    <nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container-fluid">
        <div>
          <ul class="nav navbar-nav">
            <li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Dashboard</a></li>    
            <li><a href="view_profile.php"> <span class="glyphicon glyphicon-user"></span>&nbsp;View&nbsp;Profile</a></li> 
             
            <li><a href="message.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;Message</a></li> 
               
            <li><a href="salary.php"><span class="glyphicon glyphicon-usd"></span>&nbsp;Salary&nbsp;Details</a></li> 
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;Leave<span class="caret"></span></a>     
              <ul class="dropdown-menu">
                <li><a href="leave_apply.php">Apply&nbsp;for&nbsp;Leave</a></li>
                <li><a href="leave_status.php">View&nbsp;Leave&nbsp;Status</a></li>
              </ul>
            </li>

          </ul>
            
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>    
            
        </div>
      </div>
    </nav>
    <br><br><br>

</body>
</html>


