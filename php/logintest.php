<?php
session_start();

// ... (ตอนที่เป็นการตรวจสอบการเข้าสู่ระบบเดิม)

// Handle adding child information if user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
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

    // Get the username of the logged-in user
    $logged_in_username = $_SESSION['username'];

    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $birthday = $_POST["birthday"];
    $address = $_POST["address"];
    $addnow = $_POST["addnow"];

    // Get member_id from registration table based on the logged-in username
    $stmt = $conn->prepare("SELECT member_id FROM registration WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param("s", $logged_in_username);
        $stmt->execute();
        $stmt->bind_result($logged_in_member_id);
        $stmt->fetch();
        $stmt->close();
    } else {
        die("Prepare failed: " . $conn->error);
    }

    // Insert data into the database with the retrieved member_id
    $sql = "INSERT INTO child_info (member_id, first_name, last_name, birthday, address, addnow)
    VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if ($stmt) {
$stmt->bind_param("isssss", $logged_in_member_id, $fname, $lname, $birthday, $address, $addnow);
if ($stmt->execute()) {
    header("Location: ../index.html"); // Redirect after successful insertion
} else {
    if ($stmt->errno == 1062) { // MySQL error code for duplicate entry
        echo "Warning: Member ID already exists in child_info table.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
$stmt->close();
} else {
die("Prepare failed: " . $conn->error);
}

$conn->close();
} else {
    session_start();
    $_SESSION['login_error'] = "กรุณาเข้าสู่ระบบก่อน";
    header("Location: ../login_page.php"); // Redirect to login page if not logged in
    exit();
}
?>
