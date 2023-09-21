<?php  

$phone=$_POST['phone'];
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
	
//$sql="insert into new_login(phone) values ('$phone')";
$sql1="insert into login(login_id,password,phone) values ('$user','$pass','$phone')";
//$result=$conn->query($sql);
$result = $conn->query($sql1); { //echo"<script>alert('Registered Successfully');</script>";


    echo "<script>alert('Registered Successfully');
		window.location.href = 'option.html';</script>";
}
?>