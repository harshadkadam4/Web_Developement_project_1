<?php

$bid = $_POST['id'];
$hall_option = $_POST['hall_option'];
$option = "Available";

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

$sql = "update $hall_option set status='$option' where book_id='$bid'";
$result=$conn->query($sql);

if ($result->rowCount() > 0) {
        echo "<script>alert('Updated Successfully');
        window.location.href = 'admin.html';</script>";
}
else{
    echo "<script>alert('Please Enter Correct Information');
        window.location.href = 'update_status.html';</script>";
}
	
?>