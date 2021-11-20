New record created successfully
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
		
session_start();

<?php
$servername = "localhost";
$username = "coscdrop";
$password = "letmein";
$tablename = "users";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO $tablename (fname, lname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
      
      
		<a href="report.php">Print out report of database</a></br>
		<a href="index.html"><strong>Home</strong></a>

    </body>
</html>
