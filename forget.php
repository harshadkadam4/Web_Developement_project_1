<?php  

$user=$_POST['username'];
$pass=$_POST['password'];
$cpass=$_POST['cpassword'];


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
	if($pass==$cpass)
	{
		$sql="update login set password=$pass where login_id=$user";
		$result=$conn->query($sql);
		
		$sql1="select * from login where login_id='$user'";
		$result1=$conn->query($sql1);
		if(!($result1->rowCount()>0))
		{
			echo"<script>alert('Incorrect Login_id');
            window.location.href = 'forget.html';</script>";
		}
        else
		{
			echo "<script>alert('Updated Successfully');
		window.location.href = 'option.html';</script>";
		}
	}
	else{
		header("Location:forget.html");
	}
	
	
?>