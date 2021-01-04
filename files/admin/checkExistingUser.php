<?php
	if(isset($_POST['checkuname']))
	{
		$conn=mysqli_connect("sql210.epizy.com","epiz_22421045","12345678","epiz_22421045_hrms"  ) or die("connection failed".mysqli_connect_error());
		$uname=$_POST['checkuname'];
		$sql="SELECT * from emp_info WHERE uname='$uname' LIMIT 1";
		$query=mysqli_query($conn,$sql);
		$ucheck=mysqli_num_rows($query);
		if(strlen($uname)<3 || strlen($uname)>16)
		{
			echo "too short";
			exit();
		}
		if(preg_match('#[^A-Za-z0-9]#',$uname))
		{
			echo "not alphanumeric";
			exit();
		}
		if($ucheck==1)
		{
			echo "username taken";
			exit();
		}
		else
		{
			echo "ok";
			exit();
		}
	}
?>