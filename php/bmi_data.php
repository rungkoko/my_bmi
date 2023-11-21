<?php
session_start(); // Start session (if not already started)

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to login page
    header("Location: login_page.html");
    exit();
}

// User is logged in, continue with data insertion
$height = $_POST["height"];
$weight = $_POST["weight"];
$bmi_result = $_POST["bmi_result"];
$age = $_POST["age"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current timestamp in MySQL format (YYYY-MM-DD HH:MM:SS)
date_default_timezone_set("Asia/Bangkok");
$currentTimestamp = date("Y-m-d H:i:s"); // Include time

// Get the member_id from the logged-in user's username
$logged_in_username = $_SESSION['username']; // Assuming you store the username in the session
$member_id_query = "SELECT member_id FROM registration WHERE username = '$logged_in_username'";
$result = $conn->query($member_id_query);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $member_id = $row['member_id'];

    // Insert data into weight_data table
    $sql = "INSERT INTO weight_data (member_id, weight, height, age, bmi_result, timestamp) VALUES ('$member_id', '$weight', '$height', '$age', '$bmi_result', '$currentTimestamp')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Unable to retrieve member ID";
}

$conn->close();
?>
