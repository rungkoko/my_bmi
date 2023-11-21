<?php
// เชื่อมต่อฐานข้อมูล
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

// เริ่ม session
session_start();

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ตรวจสอบว่ามี session ของผู้ใช้หรือยัง
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        
        // ดึงข้อมูลของผู้ใช้ที่ล็อกอินอยู่จากตาราง registration
        $query = "SELECT member_id FROM registration WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            $memberId = $userData['member_id'];
            
            // ดึงข้อมูลจากตาราง weight_data โดยใช้เงื่อนไข member_id
            $query = "SELECT id, timestamp, weight,height, bmi_result, age FROM weight_data WHERE member_id = :memberId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':memberId', $memberId);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // ส่งข้อมูลกลับเป็น JSON
            echo json_encode($data);
        }
    } else {
        echo "User not logged in.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
