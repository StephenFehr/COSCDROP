<html>
	<head>
		<title>Database List</title>
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
		<h1>Back to <a href="index.html"><strong>Home</strong></a></h1>
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
