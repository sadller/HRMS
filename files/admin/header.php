
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .heading{background-color:crimson;}
        .box{border:1px solid lightgrey;padding:20px;border-radius:5px;}
        .box-sm{border:1px solid lightgrey;padding:5px;border-radius:5px;background-color:white;}
    </style>


    
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
  
          <ul class="nav navbar-nav">
            <li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Dashboard</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-users"></i>&nbsp;Employee
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="add_employee.php"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Add New</a></li>
                <li><a href="view_all.php"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span>&nbsp;&nbsp;View All</a></li>
                <li><a href="edit_employee.php"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Details</a></li>
              </ul>
            </li>
            <li><a href="message.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;Message</a></li>  
            <li><a href="leave.php"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;Leave</a></li> 
            <li><a href="attendance.php"><span class="glyphicon glyphicon-calendar"></span>&nbsp;Attendance</a></li> 
            <li><a href="salary.php"><span class="glyphicon glyphicon-piggy-bank"></span>&nbsp;Salary</a></li> 
          </ul>
            
          <div class="nav navbar-nav navbar-right ">
            
          <ul class="nav navbar-nav navbar-right">
            <li><a href="change_password.php">Change Password</a></li> 
            <li><a href="logout.php" name="logout"><span class="glyphicon glyphicon-off"></span> Logout&nbsp;</a></li>
          </ul>    
            
        </div>
         </div>
    </nav>
    <br><br><br><br>
    


