<?php
if (strstr($_SERVER['SERVER_NAME'], 'localhost')){

$servername = "localhost";
$username = "root";
$password = "";
$db = "website";


}
///////////////////////////////
else {
 $servername = "talsprddb02.int.its.rmit.edu.au";
$username = "s3869994";
$password = "20022002";
$db = "s3869994";

}

////////////////////////////
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

?>

