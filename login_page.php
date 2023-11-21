<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bmi calculator</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/f/f9/%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%97%E0%B8%A3%E0%B8%A7%E0%B8%87%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B9%83%E0%B8%AB%E0%B8%A1%E0%B9%88.png">
<link rel="stylesheet" href="style.css">
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container2 {
        max-width: 400px;
        margin: 250px auto; /* เพิ่ม margin-top เพื่อขยับลงมา */
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
        h2 {
            text-align: center;
        }

        .login-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button.button-cal {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        button.button-cal:hover {
            background-color: #0056b3;
        }

        .alert {
            background-color: #FF6262;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
  <header class="p-3 text-bg-success">
    <div class="container">
        <!-- Navbar -->
        <div id="nav-container"></div>
    </div>
</header>

<!-- Login Modal -->
    <div id="nav-lg_container"></div>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div id="nav-sg_container"></div>
</div>

  <div class="container2">
    <h2>Login</h2>
    <form method="post" action="php/login.php" class="login-form">
      <div class="form-group">
      <?php
                session_start();
                if (isset($_SESSION['login_error'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
                    unset($_SESSION['login_error']); // เคลียร์ข้อความผิดพลาดหลังการแสดงผล
                }
                ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit" class="button-cal">เข้าสู่ระบบ</button>
      </div>
    </form>
  </div>
  
</body>
<script src="script.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#username').addEventListener('input', hideAlert);
    document.querySelector('#password').addEventListener('input', hideAlert);
    
    function hideAlert() {
      var alertElement = document.querySelector('.alert.alert-danger');
      if (alertElement) {
        alertElement.style.display = 'none';
      }
    }
  });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>
