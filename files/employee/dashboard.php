<?php
session_start();
if(!isset($_SESSION['username'])){
        echo "<script>location.href='../../login.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
	<style>
		body{
			background: url(../../img/wel2.png);
			background-size:cover;
		}
	</style>
</head>
<body>
<?php
    $conn = mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
	$uname = $_SESSION['username'];
	$date = date("Y-m-d");
	$query = "select * from attendance where uname='$uname' and date='$date'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)==0){
		$query = "INSERT INTO attendance VALUES ('','$uname','$date')";
		mysqli_query($conn,$query);
	}
?>
</body>
</html>