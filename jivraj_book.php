<?php  

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$contact=$_POST['contact'];
$date=$_POST['date'];
$dept=$_POST['dept'];
$time=$_POST['time'];
$status = "booked";


$d = date("Y-m-d");
$date3 = date_create($d);
$date1 = date_create($date);
$date2 = date_diff($date1, $date3);

if ($date2->invert == 1) {
	if (preg_match("/^[a-zA-z]*$/", $fname)) 
	{
		if (preg_match("/^[a-zA-z]*$/", $lname)) 
	  	{
			if (preg_match("/^[a-zA-z]*$/", $dept)) 
			{
		try {
			$host = "localhost:3307";
			$dbname = "project";
			$dbuser = "root";
			$dbpass = "1234";


			$conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
		} catch (PDOException $e) {
			echo "Error :" . $e->getMessage();
			die();
		}

		//$sql="select date from jivraj_book";
		$sql = "select date from jivraj_book where date='$date' and status='$status' and time='$time'";
		$result = $conn->query($sql);

		if ($result->rowCount() > 0) {
			//echo "<script>alert('Booking Successful');</script>";
			echo "<script>alert('Hall is Already Booked on your entered Date or Time .Please enter another Date or Time');
	window.location.href = 'jivraj_book.html';</script>";
				} else {
					$sql1 = "insert into jivraj_book(name,contact,date,dept,status,last_name,time) values('$fname','$contact','$date','$dept','$status','$lname','$time');";
					$result1 = $conn->query($sql1);
					if ($result1->rowCount() > 0) {

						$sql2 = "select book_id from jivraj_book where date='$date' and time='$time'";
						$result2 = $conn->query($sql2);
						$book_id = $result2->fetch();
						echo "<script>alert('Hall is Booked your Book_id is $book_id[0]');
	window.location.href = 'jivraj_book.html';</script>";
					}
			}		
	
			}
			else {
				echo "<script>alert('Please Enter Valid Department Name');
				window.location.href = 'jivraj_book.html';</script>";
			}
		}
		else {
			echo "<script>alert('Please Enter Valid Last Name');
			window.location.href = 'jivraj_book.html';</script>";
		}
	} 
	else {
		echo "<script>alert('Please Enter Valid First Name');
		window.location.href = 'jivraj_book.html';</script>";
	}
}
else{
	echo "<script>alert('Please Enter Future Date');
	window.location.href = 'jivraj_book.html';</script>";
}

	
?>