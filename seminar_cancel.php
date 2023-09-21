<?php  

$id=$_POST['id'];

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
	
$sql = "delete from seminar_book where book_id='$id'";
$result=$conn->query($sql);

if ($result->rowCount() > 0) {
	echo "<script>alert('Your Booking is Cancelled');
	window.location.href = 'seminar.php';</script>";
}


	
?>
