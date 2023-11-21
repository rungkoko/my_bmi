<?php
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("เกิดข้อผิดพลาดในการเชื่อมต่อกับฐานข้อมูล: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $memberId = $data->memberId;
    $action = $data->action;

    if ($action === 'delete') {
        try {
            // ดำเนินการลบข้อมูลจากฐานข้อมูลโดยใช้ $memberId
            $sql = "DELETE FROM registration WHERE member_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$memberId]);

            // ตรวจสอบว่าลบสำเร็จหรือไม่
            $success = ($stmt->rowCount() > 0);

            // ส่งค่ากลับเพื่อแจ้งสถานะการลบ
            echo json_encode(['success' => $success]);
        } catch(PDOException $e) {
            die("เกิดข้อผิดพลาดในการลบข้อมูล: " . $e->getMessage());
        }
    }
} else {
    $query = "SELECT r.member_id, r.firstName, r.lastName, r.address,
            GROUP_CONCAT(DISTINCT w.timestamp, ' - Weight: ', w.weight, ' - Height: ', w.height ORDER BY w.timestamp ASC SEPARATOR '<br>') AS weight_info,
            GROUP_CONCAT(DISTINCT c.first_name, ' ', c.last_name ORDER BY c.first_name ASC SEPARATOR '<br>') AS child_names
          FROM registration r
          LEFT JOIN weight_data w ON r.member_id = w.member_id
          LEFT JOIN child_info c ON r.member_id = c.member_id
          GROUP BY r.member_id, r.firstName, r.lastName, r.address";

    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage());
    }

    header('Content-Type: application/json');
    echo json_encode($result);
}

$pdo = null;
?>
