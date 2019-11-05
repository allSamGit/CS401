<?php

Class db_connection(){
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_db";

// Create connection
private function getConnection(){
	
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  return $conn;
}

$sql = "INSERT INTO user (userid,firstName, lastname,email,city,PostalCode,Country )
VALUES ('139','$firstname', 'Doe', 'john@example.com','boise','83705','USA')";

 
/*$stmt = $conn->prepare("INSERT INTO user (userid,firstName, lastname,email,city,PostalCode,Country) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email , $city , $postalCode , $country);
$stmt->execute(); */

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>