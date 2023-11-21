<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $rawPassword = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $gender = $_POST['gender'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];

    // Check if passwords match
    if ($rawPassword !== $confirmpassword) {
        echo "Passwords do not match.";
        exit; // You might want to handle this case more gracefully
    }

    // Hash the password securely
    $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);
    $random_member_id = mt_rand(100000, 999999);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test'); // Adjust your connection details
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration (member_id,username, password, gender, firstName, lastName, birthday, email, address, phonenumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("isssssssss", $random_member_id, $username, $hashedPassword, $gender, $firstName, $lastName, $birthday, $email, $address, $phonenumber);

        if ($stmt->execute()) {
            header("Location: ../index.html");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}

?>