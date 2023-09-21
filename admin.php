<?php

if($_SERVER['REQUEST_METHOD']='GET')
{
	$hall = $_GET['hall'];
}
else if($_SERVER['REQUEST_METHOD']='POST')
{
	$hall = $_POST['hall'];
}
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

$sql = "select * from $hall";
$result=$conn->query($sql);

if ($result->rowCount() > 0) {

        echo "<html><head>
        
            <style>
                table
                {
                        padding-right:40px;
                        border-collapse: collapse;
                }
                td,th
                {
                        padding: 10px;
                }
                
                </style></head><body>";

        echo "<table border='1'>";
        echo "<tr><th>Booking Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Contact</th>
                  <th>Date</th>
                  <th>Department</th>
                  <th>Status</th>
                  <th>Time</th>
                </tr>";
        while($row=$result->fetch())
        {
            echo "<tr><td>" .$row[0]."</td><td>"
                            .$row[1]."</td><td>"
                            .$row[6]."</td><td>"
                            .$row[2]."</td><td>"
                            .$row[3]."</td><td>"
                            .$row[4]."</td><td>"
                            .$row[5]."</td><td>"
                            .$row[7]."</td></tr>";
        }
        echo "</table></body></html>";

} 
	
?>