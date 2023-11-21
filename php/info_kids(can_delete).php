<?php
// Assuming you have a MySQL database set up
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate a random 6-digit number
$random_member_id = mt_rand(100000, 999999);

// Retrieve form data
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$birthday = $_POST["birthday"];
$address = $_POST["address"];
$addnow = $_POST["addnow"];

// Insert data into the database with the random member_id
$sql = "INSERT INTO child_info (member_id, first_name, last_name, birthday, address, addnow)
        VALUES ('$random_member_id', '$fname', '$lname', '$birthday', '$address', '$addnow')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully with member ID: " . $random_member_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
