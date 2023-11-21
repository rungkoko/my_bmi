<style>
        .register-link {
            text-decoration: none; /* ไม่ให้มี underline ใต้ข้อความลิงค์ */
            color: #007bff; /* สีของข้อความลิงค์ (สีน้ำเงิน) */
            font-weight: bold; /* ตัวหนา */
        }

        .register-link:hover {
            text-decoration: underline; /* เมื่อนำเม้าส์ไปชี้, ให้มี underline ใต้ข้อความลิงค์ */
        }
    </style>
<!-- Modal เมื่อเข้าสู่ระบบไม่สำเร็จ -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- แสดงข้อความผิดพลาดที่เก็บใน session -->
                <?php
                session_start();
                if (isset($_SESSION['login_error'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
                    unset($_SESSION['login_error']); // เคลียร์ข้อความผิดพลาดหลังการแสดงผล
                }
                ?>
                <form method="post" action="php/login.php">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required><br>

                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- เพิ่มลิงค์ไปยังหน้า "regis_page.html" ด้วยการใช้งาน HTML anchor tag -->
                <a href="regis_page.html" class="register-link">ลงทะเบียนเพื่อเข้าสู่ระบบ</a>
            </div>
        </div>
    </div>
</div>

<!-- ส่วนอื่น ๆ ของหน้าเว็บไซต์ -->
