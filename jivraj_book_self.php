<html>

<head>
    <title>Booking</title>
    <link rel="stylesheet" type="text/css" href="style_jivraj_book.css">
</head>

<body>

    <div class="book_form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p>Enter Name</p>
            <input type="text" name="name" placeholder="Enter Name">
            <p>Enter Contact No.</p>
            <input type="number" name="contact" placeholder="Enter Phone No.">
            <p>Enter Date</p>
            <input type="date" name="date" placeholder="">
            <p>Enter Department Name</p>
            <input type="text" name="dept" placeholder="Enter Department">
            <input type="checkbox" required>
            <p>i hereby accept the terms and conditions</p><br>
            <input type="submit" name="submit" value="Book">

        </form>
    </div>
    <?php  

$name=$_POST['name'];
$contact=$_POST['contact'];
$date=$_POST['date'];
$dept=$_POST['dept'];


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
	
//$sql="select date from jivraj_book";
$sql = "insert into jivraj_book values('$name','$contact','$date','$dept')";
$result=$conn->query($sql);

	if($result->rowCount()>0)
	{
    echo "<script>alert('Booking Successful');</script>";
	}

	
?>


</body>

</html>