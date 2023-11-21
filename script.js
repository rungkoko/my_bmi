// เมื่อโหลดหน้าเว็บเสร็จ
document.addEventListener("DOMContentLoaded", function() {
    loadLoginPopup();
});

function loadLoginPopup() {
    fetch('php/login_popup.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('nav-lg_container').innerHTML = data;
        })
        .catch(error => {
            console.error('เกิดข้อผิดพลาดในการโหลดไฟล์ login_popup:', error);
        });
}

// nav
document.addEventListener("DOMContentLoaded", function() {
    loadnav();
});

function loadnav() {
fetch('php/nav.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('nav-container').innerHTML = data;
            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการโหลดไฟล์ nav.php:', error);
            });
}

//
document.addEventListener("DOMContentLoaded", function() {
    loadSignupPopup();
});

function loadSignupPopup() {
fetch('php/signup_popup.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('nav-sg_container').innerHTML = data;
            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการโหลดไฟล์ signup_popup.php:', error);
            });
}

document.addEventListener("DOMContentLoaded", function() {
    cal_Page();
});

function cal_Page() {
fetch('php/cal_page.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('cal-page_container').innerHTML = data;
            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการโหลดไฟล์ cal_page.php:', error);
            });
}

