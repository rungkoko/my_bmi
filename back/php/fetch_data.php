<?php
// ตรวจสอบว่ามีการส่งข้อมูลมาโดยใช้ POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // เชื่อมต่อกับฐานข้อมูล (ใช้ข้อมูลการเชื่อมต่อของคุณ)
    $host = 'localhost';
    $dbname = 'test';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อฐานข้อมูล
    if ($conn->connect_error) {
        die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
    }

    // รับข้อมูลจากแบบฟอร์ม
    $member_id = $_POST["member_id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $birthday = $_POST["birthday"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phonenumber = $_POST["phonenumber"];

    $child_first_name = $_POST["child_first_name"];
    $child_last_name = $_POST["child_last_name"];
    $child_birthday = $_POST["child_birthday"];

    // เพิ่มข้อมูลลงในตาราง 'registration'
    $sql_registration = "INSERT INTO registration (member_id, username, password, gender, firstName, lastName, birthday, email, address, phonenumber)
    VALUES ('$member_id', '$username', '$password', '$gender', '$firstName', '$lastName', '$birthday', '$email', '$address', '$phonenumber')";

    if ($conn->query($sql_registration) === TRUE) {
        echo "บันทึกข้อมูลในตาราง 'registration' เรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูลในตาราง 'registration': " . $conn->error;
    }

    // เพิ่มข้อมูลลงในตาราง 'child_info'
    $sql_child_info = "INSERT INTO child_info (member_id, fisrt_name, last_name, birthday, address)
    VALUES ('$member_id', '$child_first_name', '$child_last_name', '$child_birthday', '$address')";

    if ($conn->query($sql_child_info) === TRUE) {
        echo "บันทึกข้อมูลในตาราง 'child_info' เรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูลในตาราง 'child_info': " . $conn->error;
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
}
?>
