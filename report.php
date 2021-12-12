
<!DOCTYPE html>
<HTML>
      <head>
          <title>Home Page</title>
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
          <a href="report.php" style="pointer-events: none;">Report of Database</a>
          <a href="AJAX.html">Ajax Example</a>
    </div>
        <br><br>
	  <h2>Report of Database</h2>
	<?php 		

$DBName = "coscdrop";
$TableName = "users";
$col = array("fname", "lname", "id", "email","phone");
$numcol = count($col);

//connect to server and select database
$mysqli = mysqli_connect("localhost", "coscdrop", "letmein", $DBName);

//create and issue the query
$targetfname = filter_input(INPUT_POST, 'fname');
$targetlname = filter_input(INPUT_POST, 'lname');
$targetemail = filter_input(INPUT_POST, 'email');
$targetphone = filter_input(INPUT_POST, 'phone');

$sql = "SELECT * FROM " . $TableName;

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) < 1) {
    //echo "not enough";
    header("Location: index.php");
} else {

    echo "<h2> User Information: </h2>";
        
	echo "<table><tr>";
	for ($i = 0; $i < $numcol; $i++) {
		echo "<th>" . $col[$i];}
        echo "</tr>";

    	while ($row = mysqli_fetch_array($result)) {
        for ($i = 0; $i < count($col); $i++) {
            echo"<td>" . $row[$i];
        }
        echo "</tr>";
	
    } //while   
	echo "</table>";
}

	?>
	</body>
</html>
