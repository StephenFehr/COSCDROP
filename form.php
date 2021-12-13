
<!DOCTYPE html>
<HTML>
      <head>
          <title>Form</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="style.css">
      </head>
  <body>
    <img id="titleImage" src="images/Banner_image.jpg" alt="Banner">
    <br>
    <div class="header">
          <a href="index.html">Home</a>
          <a href="validatealert.html">Validate Alert</a>
          <a href="formvalidation.html">Validate Text</a>
          <a href="form.html">New User</a>
          <a href="report.php">Report of Database</a>
          <a href="AJAX.html">Ajax Example</a>
	  <a href="jquery.html">JQuery Example</a>
    </div>
        <br><br>
    <h2>Form Entered</h2>

<?php
	
$servername = "localhost";
$username = "coscdrop";
$password = "letmein";
$dbname = "coscdrop";
$tablename = "users";
	    
$targetfname = filter_input(INPUT_POST, 'fname');
$targetlname = filter_input(INPUT_POST, 'lname');
$targetemail = filter_input(INPUT_POST, 'email');
$targetphone = filter_input(INPUT_POST, 'phone');
	    

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$select = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '".$targetemail."'") or exit(mysqli_error($connectionID));
if(mysqli_num_rows($select)) {
    echo "This email is already being used";
    echo "<br><br><a href='form.html'>Try Again?</a></br>";
    exit();
}
	  
$sql = "INSERT INTO $tablename (fname, lname, email,phone)
VALUES ('$targetfname', '$targetlname', '$targetemail', '$targetphone')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	    echo "
	<table>
		  <tr>
			<th>First name</th>
			<th>Last name</th>
			<th>Email</th>
			<th>Phone</th>
			
		  </tr>
		  <tr>
			<td>$targetfname</td>
			<td>$targetlname</td>
			<td>$targetemail </td>
			<td>$targetphone </td>
		  </tr>
		</table>";
	    
	    
mysqli_close($conn);
?>

		<a href="report.php">Print out report of database</a></br>
    </body>
</html>
