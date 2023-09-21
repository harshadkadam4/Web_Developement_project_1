<?php  

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
	
$sql="select date,time from seminar_book where status='booked' order by date";
$result=$conn->query($sql);

	if($result->rowCount()>0)
	{
		
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style_seminar.css">
	<style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }
        
        li {
            float: left;
        }
        
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        
        li a:hover:not(.active) {
            background-color: #111;
        }
        
        .active {
            background-color: #04AA6D;
        }

body {
    margin: 0;
    padding: 0;
    background: url(prashasan_bhavan.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}

.login-box {
    width: 420px;
    height: 580px;
    background: rgb(255, 225, 24, );
    color: #000;
    top: 50%;
    left: 20%;
    position: absolute;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    padding: 20px 30px;
    border-radius: 2%;
    box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 1);
}

h1 {
    margin: 0;
    padding-top: 0%;
    padding: 0 0 20px;
    text-align: center;
    font-size: 35px;
}

.login-box input[type="submit"] {
    border: none;
    outline: none;
    height: 40px;
    width: 200px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
    position: relative;
    padding-top: 0%;
    margin-bottom: 3%;
    margin-top: 3%;
    left: 75px;
}

.login-box input[type="submit"].cancel {
    border: none;
    outline: none;
    height: 40px;
    width: 200px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
    position: relative;
    padding-top: 0%;
    margin-bottom: 0%;
    margin-top: 3%;
    left: 75px;
}

.login-box input[type="submit"]:hover {
    cursor: pointer;
    background: #39dc79;
    color: #000;
}

.login-box p {
    text-align: center;
    margin: 0;
    padding: 0;
    padding-bottom: 0%;
    font-weight: bold;
    font-size: 20px;
    color: #000;
}
.login-box table {
    margin-left: 60px;
    align-items: center;
    color: redcrimson;
    border-collapse: collapse;
    border: 10px;
    font-weight: bold;
    color: #000;
    
}

.login-box td{
    padding: 10px;
}
.login-box th{
    padding: 10px;
}

    </style>

   
</head>

<body>
<ul>
        <li><a href="option.html">Home</a></li>
        <li><a href="about.html">About Us</a></li>
        <li style="float:right"><a class="active" href="login.html">Login</a></li>
    </ul>
    <div class="login-box">
        <h1>BOOKED DATES</h1>
        <?php
        echo "<table border='1'>";
        echo "<tr><th>Date</th> <th>Time</th></tr>";
		while($row=$result->fetch())
		{
		echo "<tr><td>" . $row[0] . "</td><td>"
                        . $row[1] . "</td></tr>";
		}
        echo "</table>";
        ?>
        
    </div>

</body>

</html>		
<?php		
		
	}

	
?>

