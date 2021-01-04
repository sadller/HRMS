
<?php 

session_start();
if(isset($_SESSION['uname'])){
    session_unset();
    session_destroy();
}
echo "<script>location.href='../../login.php'</script>";
?>