<?php  

$user=$_POST['username'];
$pass=$_POST['password'];


try
	{
		$host="localhost:3307";
		$dbname="project";
		$dbuser="root";
		$dbpass="1234";
		
		
		$conn=new PDO("mysql:host=$host;dbname=$dbname",$dbuser,$dbpass);
	}
	catch(PDOException $e)
	{
		echo "Error :".$e->getMessage();
		die();
	}
	
$sql="select * from login where login_id='$user' and password='$pass'";
$result=$conn->query($sql);


	if($result->rowCount()>0)
	{
		header("Location:option.html");
	}
	else
	{
		echo "<script>alert('Incorrect Username or Password');
		window.location.href = 'login.html';</script>";
	}
	
?>