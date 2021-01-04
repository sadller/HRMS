<?php
session_start();
if(!isset($_SESSION['uname'])){
        echo "<script>location.href='../../login.php'</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php"); ?>
</head>
<body style="background-image:url(../../img/dashboard_back.jpg);background-size:cover;">
<div style="top:60%;left:40%;position:absolute;background:rgba(100,100,100,100);">
    <!-- <iframe src="https://giphy.com/embed/3ohfFDPhabUskDp67e" width="480" height="218" frameBorder="0" class="giphy-embed" allowFullScreen></iframe> -->
    
</div>
</body>
</html>
