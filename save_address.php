<?php require ("logo.php"); ?>
<?php
include("connect.php");
$h_no = $_POST['h_no'];
$province = $_POST['province'];
$amphur = $_POST['amphur'];
$district = $_POST['district'];
$sql = "INSERT INTO address(h_no,province,amphur,district)
			 VALUES('$h_no','$province','$amphur','$district')";
$result = mysqli_query($objCon, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($objCon);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Register Succesfuly');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to register again');";
	echo "</script>";
}
?>