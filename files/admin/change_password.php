<?php
session_start();
if(!isset($_SESSION['uname'])){
        echo "<script>location.href='../../login.php'</script>";
    }
  $uname = $_SESSION['uname'];
?>

  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <style>
      #error{color:red;font-size:14px;}    
    </style>
    
    <?php include_once("header.php"); ?>
    
    <script>
      function checkPass(){
        var x = document.getElementById("new_pass");
        var y = document.getElementById("cnf_pass");
        if(x.value != y.value)
          document.getElementById("error").innerHTML="Password mismatch";
        else
          document.getElementById("error").innerHTML="";
      }
      
      $(document).ready(function(){
        $("#success").on("hidden.bs.modal", function () {
              location.href='dashboard.php';
          });
      });
    </script>
  </head>

  <body>

    <div class="container">
      <div class="col-md-4"></div>
      <form action="#" method="post">
        <div class="col-md-4 form-group box">
          <h3 class="page-header">Reset Password</h3>
          <input type="text" id="cur_pass" name="cur_pass" placeholder="Current Password" class="form-control" autocomplete="off" required /><br/>
          <input type="text" id="new_pass" name="new_pass" placeholder="New Password" class="form-control" autocomplete="off" required/><br/>
          <input type="text" id="cnf_pass" name="cnf_pass" placeholder="Confirm Password" class="form-control"  onblur="checkPass()" autocomplete="off" required/>
          <p id="error"></p><br>
          <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Reset</button>
        </div>
      </form>
      <div class="col-md-4"></div>
    </div>

    
    
  <div class="modal fade" id="success" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bahut sahiii</h4>
        </div>
        <div class="modal-body">
          <p>Password changed successfully.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
        </div>
      </div>

    </div>
  </div>
    
    
  </body>

  </html>


<?php

  if(isset($_POST['submit'])){
    
    $cur = $_POST['cur_pass'];
    $new = $_POST['new_pass'];
    $cnf = $_POST['cnf_pass'];
    $err = "";
    $pass = "";
    if($new!=$cnf){
      $err .= "Password mismatch.";
    }
    
    $conn = mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection error".mysqli_connect_error());
    $query = "select password from admin where uname='$uname' limit 1";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
    	$row = mysqli_fetch_assoc($result);
		$pass = $row['password'];
		if($pass!=$cur)
			$err .= "Incorrect Current Password";
    }    
    
    if($err!=""){
		echo "<script>alert('$err');</script>";
	}
	else{
		$query = "update admin set password='$new' where uname='$uname'";
    	if(mysqli_query($conn,$query)==true)
			echo "<script>$('#success').modal('show');</script>";
		
	}
  }

?>