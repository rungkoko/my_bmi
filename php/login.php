<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $rawPassword = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test'); // ปรับแต่งรายละเอียดการเชื่อมต่อฐานข้อมูลของคุณที่นี่
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT password FROM registration WHERE username = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($storedHashedPassword);
            $stmt->fetch();

            if (password_verify($rawPassword, $storedHashedPassword)) {
                // Start session (if not already started)
                session_start();

                // Store user's login status in session
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                // Check if the username and password are 'admin'
                if ($username === 'admin' && $rawPassword === 'admin') {
                    // Redirect to bmi.html for 'admin' login
                    header("Location: ../back/index.html");
                    exit();
                }

                // Determine the redirect location based on the referring page
                $referrer = $_SERVER['HTTP_REFERER'];
                if (strpos($referrer, 'login_page.php') !== false) {
                    header("Location: ../information_kids.html");
                } elseif (strpos($referrer, 'login_popup.php') !== false) {
                    header("Location: ../index.html");
                } elseif (strpos($referrer, 'calculate_page.html') !== false) {
                    header("Location: ../calculate_page.html");
                } else {
                    // Default redirect if unable to determine referring page
                    header("Location: ../index.html");
                }

                exit();

            } else {
                // Set an error message in the session
                session_start();
                $_SESSION['login_error'] = "username หรือ password ไม่ถูกต้อง";
                header("Location: ../login_page.php");
            }
        } else {
            // Set an error message in the session
            session_start();
            $_SESSION['login_error'] = "username หรือ password ไม่ถูกต้อง";
            header("Location: ../login_page.php");
        }

        $stmt->close();
        $conn->close();
    }
}
?>
