<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MAC</title>
</head>

<body>
<?php

$servername = "127.12.48.2";
$username = "admin5Iw3Vsm";
$password = "IqM5jXfTyGQR";
$dbname = "info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM macdb";
$result = $conn->query($sql);

if ($result->num_rows > 0) {   
	echo "AllowPhone ";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "".$row["mac"]." ";
	}
	echo ending;
}
else {
	echo "DataBase is empty.";
}


?>
</body>
</html>