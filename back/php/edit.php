<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CRUD</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<style>
    /* CSS สำหรับฟอร์มแก้ไข */
    .input-container {
        display: flex;
        flex-direction: column;
        align-items: center; /* จัดเรียงอิงซ้าย */
        margin-bottom: 15px;
    }

    .input-container label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .input-container input {
        width: 100%;
        max-width: 400px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .input-container input[type="date"] {
        /* ปรับขนาดของ input ประเภท date */
        padding: 7px;
    }

    .input-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 18px;
    }

    .input-container input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<body>
        <!-- แท็บด้านซ้าย -->
<div class="sidebar">
    <a href="/my_bmi/index.html">หน้าหลัก</a>
    <a href="../index.html">จัดการข้อมูล</a>
    <a href="#">เพิ่มข้อมูล</a>
</div>
<?php
if (isset($_GET['member_id'])) {
    $member_id = $_GET['member_id'];

    // การเชื่อมต่อฐานข้อมูล
    $host = 'localhost';
    $dbname = 'test';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // สร้างคำสั่ง SQL เพื่อดึงข้อมูลของสมาชิกจาก member_id
        $sql = "SELECT * FROM registration WHERE member_id = :member_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
        $stmt->execute();

        // ตรวจสอบว่ามีข้อมูลหรือไม่
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // แสดงแบบฟอร์มแก้ไขข้อมูลของสมาชิก
            echo "<form method='POST' action='update.php'>"; // ตั้งค่า action ให้เป็นหน้าที่จะทำการอัพเดตข้อมูล
            echo "<div class='input-container'>";
            echo "<h2 style='text-align:center;'>แก้ไขข้อมูลสมาชิก</h2>"; // เพิ่มหัวข้ออยู่ตรงกลาง
            echo "</div>";
            echo "<div class='input-container'>";
            echo "<label for='member_id'>Member ID:</label>";
            echo "<input type='text' id='member_id' name='member_id' value='{$row['member_id']}' readonly>";
            echo "</div>";

            echo "<div class='input-container'>";
            echo "<label for='username'>Username:</label>";
            echo "<input type='text' id='username' name='username' value='{$row['username']}'>";
            echo "</div>";

            echo "<div class='input-container'>";
            echo "<label for='firstName'>Firstname:</label>";
            echo "<input type='text' id='firstName' name='firstName' value='{$row['firstName']}'>";
            echo "</div>";

            echo "<div class='input-container'>";
            echo "<label for='lastName'>Lastname:</label>";
            echo "<input type='text' id='firstName' name='lastName' value='{$row['lastName']}'>";
            echo "</div>";

            echo "<div class='input-container'>";
            echo "<label for='birthday'>Birthday:</label>";
            echo "<input type='date' id='birthday' name='birthday' value='{$row['birthday']}'>";
            echo "</div>";

            // เรียกดึงข้อมูลจากตาราง child_info โดยอ้างอิง member_id
            $sql_child_info = "SELECT * FROM child_info WHERE member_id = :member_id";
            $stmt_child_info = $pdo->prepare($sql_child_info);
            $stmt_child_info->bindParam(':member_id', $member_id, PDO::PARAM_INT);
            $stmt_child_info->execute();

           // ตรวจสอบว่ามีข้อมูล child_info หรือไม่
if ($stmt_child_info->rowCount() > 0) {
    // ใช้ลูปเพื่อแสดงข้อมูลจาก child_info
    while ($child_info = $stmt_child_info->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='input-container'>";
        echo "<label for='childFirstName'>Child First Name:</label>";
        echo "<input type='text' id='childFirstName' name='childFirstName[]' value='{$child_info['first_name']}'>";
        echo "</div>";

        echo "<div class='input-container'>";
        echo "<label for='childLastName'>Child Last Name:</label>";
        echo "<input type='text' id='childLastName' name='childLastName[]' value='{$child_info['last_name']}'>";
        echo "</div>";

        echo "<div class='input-container'>";
        echo "<label for='childBirthday'>Child Birth:</label>";
        echo "<input type='date' id='childBirthday' name='childBirthday[]' value='{$child_info['birthday']}'>";
        echo "</div>";
    }
}

echo "<div class='input-container'>";
echo "<label for='address'>address:</label>";
echo "<input type='text' id='address' name='address' value='{$row['address']}'>";
echo "</div>";
            echo "<div class='input-container'>";
            echo "<input type='submit' value='บันทึกการแก้ไข' name='update'>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "ไม่พบข้อมูลสมาชิกที่ต้องการแก้ไข";
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . $e->getMessage();
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $pdo = null;
}
?>



</body>
</html>
