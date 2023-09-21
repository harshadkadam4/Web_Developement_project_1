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

$sql1="select * from admin_login where username='$user' and password='$pass'";
$result1=$conn->query($sql1);


$sql2="select * from login where login_id='$user'";
$result2=$conn->query($sql2);

$sql3="select * from login where password='$pass'";
$result3=$conn->query($sql3);


	if($result->rowCount()>0)
	{
		header("Location:option.html");
	}
	
	else if($result1->rowCount()>0)
	{
		header("Location:admin.html");
	}

	else if($result2->rowCount()>0 && $result3->rowCount()==0)
	{
		echo "<script>alert('Incorrect Password');
		window.location.href = 'login.html';</script>";
	}

	else if($result2->rowCount()==0 && $result3->rowCount()>0)
	{
		echo "<script>alert('Incorrect Username');
		window.location.href = 'login.html';</script>";
	}
	else
	{
		echo "<script>alert('Incorrect Username or Password');
		window.location.href = 'login.html';</script>";
	}
	
?>