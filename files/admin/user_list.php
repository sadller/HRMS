<?php
    $username = $_SESSION['uname'];

    
    $query = "select * from emp_info";
    $result = mysqli_query($conn,$query);
    echo "<input type='text' name='search_user' id='search_user' placeholder='Search' onkeyup='searchUser()' />";
    echo "<div id='user_list'>";
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $image_path="photos/".$row['photo'];
            if($row['pend_msg']>0)
                $pend_msg="(".$row['pend_msg'].")";
            else
                $pend_msg="";
            $cmd =  "<form action='#' method='post'>
                    <input type='text' name='ID' id='ID' style='display:none;' value='".$row['uname']."' />
                    <button type='submit' name='_view' class='user-btn' id='".$row['uname']."' >
                        <table>
                            <tr><td rowspan='2' class='user-icon'><img src='".$image_path."'></td><td colspan='2'><h3>".$row['fname']." ".$row['lname']."</h3></td></tr>
                            <tr><td class='user-name'>".$row['uname']."</td><td class='msg-notf'>".$pend_msg."</td></tr>
                        </table>
                    </button>
                    </form>";
                        
            echo $cmd;
        }
    }
    echo "</div>";
    
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        #search_user{
            width: 100%;
            margin: 0px;
            height:40px;
            font-size: 16px;
            padding-left:10px;
            color:white;
            background-color:crimson;
        }
        button{
            padding: 0px;
            width: 100%;
        }
        table,td{
            width: 100%;
            margin: 0px;
        }
        td{
            text-align: left;
            padding-left: 5px;
            font-size:16px;
            font-weight: bold;
            padding-top: 0px;
            padding-bottom: 0px;
        }
        table img{
            width:50px;
            height:50px;
            border-radius:100px;
            background-color:bisque;
        }
        h3,p{
            padding-top:0px;
            padding-bottom:0px;
            margin:0px; 
        }
        .user-icon{
            width:30%;
        }
        .user-btn{
            background-color:white;
            padding: 0px;
        }
        .user-btn:hover{
            background-color:darkgoldenrod;
        }
        .user-name{
            color:darkred;
        }
        .msg-notf{text-align: right;padding-right:10px; }
    </style>
    
    <script>
        
      
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    
        
        
        function searchUser()
		{
			var x=document.getElementById('search_user').value;
			var ajx = new XMLHttpRequest();
			ajx.onreadystatechange=function()
			{
				if(this.readyState==4 && this.status==200)
				{
					document.getElementById("user_list").innerHTML=this.responseText;
				}
			}
			ajx.open("POST","get_user_list.php",true);
			ajx.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajx.send("getUsers="+x);
		}
    </script>
</head>
</html>