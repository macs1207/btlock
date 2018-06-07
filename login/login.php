<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>自動導向</title>
</head>

<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
include("mysql_connect.inc.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$result = mysql_query("SELECT * FROM account
WHERE ac='$id'");
$row = @mysql_fetch_row($result);
if ( $id == $row["1"] && sha1($pw) == $row["2"] && $row["3"] == admin ) {
	setcookie("user", "".$id."", time()+600);
	echo "<script type='text/javascript'>";
	echo "window.location.href='/login/adminPage.php'";
	echo "</script>";
}elseif ( $id == $row["1"] && sha1($pw) == $row["2"] && $row["3"] == user ){
	setcookie("user", "".$id."", time()+600);
	echo "<script type='text/javascript'>";
	echo "window.location.href='/login/userPage.php'";
	echo "</script>";
}elseif ( $id == $row["1"] && sha1($pw) == $row["2"] && $row["3"] == test ){
	setcookie("user", "".$id."", time()+600);
	echo "<script type='text/javascript'>";
	echo "window.location.href='/login/testPage.php'";
	echo "</script>";
}else {
	echo "ID or Password error.<br>";
	echo "<script type='text/javascript'>";
	echo "window.location.href='/login'";
	echo "</script>";
}

?>
</body>
</html>