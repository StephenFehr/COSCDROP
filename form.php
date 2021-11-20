
<html>
    <head>
        <title>New User Input</title>
        <style>
            body{background-color:bisque;}
            h1{font: 28px;}
            table, th, td {
              border: 1px solid black;
              background-color: Ivory;
              font: 28px;
              color: blue;
            }
        </style>
    </head>
    <body>
		


<?php
$servername = "localhost";
$username = "coscdrop";
$password = "letmein";
$tablename = "users";
	    
$targetfname = filter_input(INPUT_POST, 'fname');
$targetlname = filter_input(INPUT_POST, 'lname');
$targetemail = filter_input(INPUT_POST, 'email');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO $tablename (fname, lname, email)
VALUES ($targetfname, $targetlname, $targetemail)";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	<table>
		  <tr>
			<th>First name</th>
			<th>Last name</th>
			<th>Email</th>
		  </tr>
		  <tr>
			<td>$targetfname</td>
			<td>$targetlname</td>
			<td>$targetlname</td>
		  </tr>
		</table>
	    
	    
mysqli_close($conn);
?>
      
      
		<a href="report.php">Print out report of database</a></br>
		<a href="index.html"><strong>Home</strong></a>

    </body>
</html>
