<?php
ob_start();
session_start();

$con = mysqli_connect("localhost" , "root" , "" , "lably") or die("No Database connection");
mysqli_query($con , "set character_set_server='utf8'");
mysqli_query($con , "set names 'utf8'");

$page = explode("/" , $_SERVER['PHP_SELF']);
$cpage =explode(".php",$page[count($page)-1]);
if(count($cpage) > 0){
$cpage = $cpage[0];		
}

$enter = "false";
$today = date("Y-m-d");
$days = array("الأحد" , "الأثنين" , "الثلاثاء" , "الأربعاء" , "الخميس");
$days_date = array("sunday" , "monday" , "tuesday" , "wednesday" , "thursday");
$sch_time = array("1" , "2" , "3");
$times = array("من 8:00 إلى 9:30" , "من 10:00 إلى 11:45" , "من 12:45 إلى 2:35");

if(!empty($_SESSION['username']) && !empty($_SESSION['password'])) {
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];

	$user_qu = "select * from `users` where `password` = '$password' and `username` = '$username'";
	$user_qu = mysqli_query($con , $user_qu);
	if((mysqli_num_rows($user_qu) <= 0) || isset($_GET['logout'])){
		unset($_SESSION['username']);
	    unset($_SESSION['password']);
		header("location:./");
		exit();
	}
	$run_user = mysqli_fetch_array($user_qu);
	$user_id = $run_user['id'];
	$enter = "true";
}

if($cpage != "login" && $cpage != "stu_enter"&& $cpage != "books" && $enter == "false"){
	header("location:./login.php");
}else if($cpage == "login" && $enter == "true") {
	header("location:./");
}
?>