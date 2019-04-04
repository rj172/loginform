<?php
 $conn=new mysqli("localhost","root","","first");
 if($conn->connect_error)
	die("connection failed".$conn->connect_eroor);
 $sql ="CREATE TABLE login(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	userid VARCHAR(50) NOT NULL,
	pass VARCHAR(50) NOT NULL
	
)";
 


?>


<html>
<head>
	<title>romil</title>
</head>
<body>
<h1>LOGIN Form</h1>
<form action="", method ="post">
Username:<input type="text" name="username" required/><br><br>
Password:<input type="password" name="password" required/><br><br>
<input type="submit" value="LOGIN" name="btn"/>
</form>  
</body>
</html>


<?php
if(isset($_REQUEST["btn"]))
{
   $user=$_POST["username"];
   $pass = $_POST["password"];
  $sql ="SELECT * FROM first.login WHERE userid LIKE '$user' and pass like '$pass'";
  $result = $conn->query($sql);
  if($result->num_rows > 0)
  {	while($row=$result->fetch_assoc())
	{
	$u = $row["userid"];
	$p = $row["pass"];}
	if($user==$u && $pass==$p)
	echo '<script>alert("success");</script>';
	
	
  		
  }
 if($result->num_rows!=1)
	echo '<script>alert("failed");</script>';
}
?>