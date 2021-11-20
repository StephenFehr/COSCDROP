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

$DBName = "coscdrop";
$TableName = "users";
$col = array("fname", "lname", "id", "email");
$numcol = count($col);

//connect to server and select database
$mysqli = mysqli_connect("localhost", "coscdrop", "letmein", $DBName);

//create and issue the query
$targetname = filter_input(INPUT_POST, 'username');

$sql = "SELECT * FROM " . $TableName . " WHERE name = '" . $targetname . "'";

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) < 1) {
    //echo "not enough";
    header("Location: Index.php");
} else {


    echo "<html>
        <head>
        <link rel='stylesheet' href='Birthday.css'>
        <title>Happy Birthday</title>
        </head>
        <body style='background-color:bisque'>";

    echo "<h2> User Information: </h2>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<table><tr>";
        for ($i = 0; $i < count($col); $i++) {
            echo "<th>" . $col[$i];
        }
        echo "</tr>";
        for ($i = 0; $i < count($col); $i++) {
            echo"<td>" . $row[$i];
        }
        echo "</tr>";
    } //while   
}
?>
      
      
		<a href="report.php">Print out report of database</a></br>
		<a href="index.html"><strong>Home</strong></a>

    </body>
</html>
