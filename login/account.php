<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" type="image/x-icon" href="/icon.ico" />
<!-- Include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include jQuery Mobile stylesheets -->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <!-- Include the jQuery library -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Account</title>
</head>

<body>
<?php

if(isset($_COOKIE["user"])){
	echo ("<div data-role=\"page\" id=\"pageone\">
		<div data-role=\"header\">
			<h1>帳戶管理</h1>
		</div>
		<div data-role=\"main\" class=\"ui-content\">
    		<p>歡迎，" . $_COOKIE["user"] . "！<br></p>
		</div>");
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
	$sql = "SELECT * FROM account";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
   
    		// output data of each row
			echo("<div data-role=\"footer\">
    				<h1>現有帳戶<br></h1>
  				</div>");
			echo("<div data-role=\"main\" class=\"ui-content\">
				<p>格式：帳戶類型 _ 帳戶名稱<br></p>
			</div>");
			echo ("<div data-role=\"main\" class=\"ui-content\">");
			echo ("<form  method=\"post\" />");
			while($row = $result->fetch_assoc()) {
				echo ("<p><input type=\"radio\" name=\"account\" value=\"".$row["id"]."\"><br>".$row["com"]."_".$row["ac"]."</input><br></p>") ;
			}			
			echo ("<p><input type=\"submit\" value=\"刪除\" ></p></form></div>");
		} else {                       //0 result
			echo "DataBase is empty.";
		}

			// sql to delete a record
		if ($_POST["account"] != "") {
			$sql1 = "DELETE FROM account WHERE id='" .$_POST["account"]. "' ";
			if (mysqli_query($conn, $sql1)) {
				echo "刪除成功！";
				echo "<script type='text/javascript'>";
				echo "window.location.href='/login/account.php'";
				echo "</script>";
			} else {
			    echo "Error deleting record: " . mysqli_error($conn);
			}
		}
				
		$conn->close();
	
		//add mac
		echo ("<br><br><div data-role=\"footer\">
   				<h1>新增裝置</h1>
  		</div>
		<div data-role=\"main\" class=\"ui-content\">
    		<p><form action=\"../SQL/addAccount.php\" method=\"post\">
			帳號： <input type=\"text\" name=\"newAc\" /><br>
			密碼： <input type=\"text\" name=\"newPw\" /><br>
			<input type=\"radio\" name=\"com\" value=\"admin\"><br>管理員</input><br>
			<input type=\"radio\" name=\"com\" value=\"user\"><br>使用者</input><br>
			<input type=\"submit\" value=\"建立帳戶\" />
			</form></p>
		</div>");
		
		//sign out
		echo ("<input name=\"Back\" type=\"button\" value=\"回管理頁\" onclick=\"location.href='/login/adminPage.php'\" />");
		echo ("<input name=\"sign out\" type=\"button\" value=\"登出\" onclick=\"location.href='/login/cookie.php'\" />");
} else {
	echo ("<div data-role=\"page\" id=\"pageone\">
		<div data-role=\"header\">
			<h1>錯誤</h1>
		</div>
	
		<div data-role=\"main\" class=\"ui-content\">
			<p>登入逾時，請重新登入</p>
		</div>");
	echo "<Script Language=\"JavaScript\">";
	echo ("setTimeout(\"location.href='/login'\",3000)");
	echo "</Script>";
}
echo "<div data-role=\"footer\">
  <h1>Supported by Openshift.</h1>
</div>
</div>";
?>
	
</body>
</html>