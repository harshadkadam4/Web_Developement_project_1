<?php  

$id=$_POST['id'];
$status = "Available";

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
	
$sql = "update jivraj_book set status='$status' where book_id='$id'";
$result=$conn->query($sql);

if ($result->rowCount() > 0) {
	echo "<script>alert('Your Booking is Cancelled');
	window.location.href = 'jivraj.php';</script>";
}
else{
	echo "<script>alert('Please Enter Valid Booking Id');
	window.location.href = 'jivraj_cancel.html';</script>";
}


	
?>
