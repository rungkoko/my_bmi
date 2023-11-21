document.addEventListener("DOMContentLoaded", function () {
    const dataTable = document.getElementById("data-table").getElementsByTagName("tbody")[0];

    // ดึงข้อมูลจาก process.php
    fetch('../back/php/process.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(function (item) {
                const row = dataTable.insertRow();

                const editButton = document.createElement('button');
                editButton.textContent = 'แก้ไข';
                editButton.addEventListener('click', function () {
                    // ส่ง member_id ไปยังหน้า edit.php ผ่าน URL
                    window.location.href = `../back/php/edit.php?member_id=${item.member_id}`;
                });
                


                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'ลบ';
                deleteButton.style.backgroundColor = 'red'; // เพิ่มสีพื้นหลังสีแดง
                deleteButton.style.color = 'white'; // เพิ่มสีตัวอักษรขาว
                deleteButton.addEventListener('click', function () {
                // เรียกฟังก์ชันสำหรับลบข้อมูล โดยส่ง item.member_id หรือข้อมูลอื่น ๆ ที่คุณต้องการใช้งาน
                 deleteData(item.member_id);
                });


                row.innerHTML = `
                    <td>${item.member_id}</td>
                    <td>${item.firstName} ${item.lastName}</td>
                    <td>${item.child_names}</td>
                    <td>${item.address}</td>
                    <td></td> <!-- สร้างคอลัมน์สำหรับปุ่มแก้ไข -->
                    <td></td> <!-- สร้างคอลัมน์สำหรับปุ่มลบ -->
                `;

                // เพิ่มปุ่มแก้ไขและลบลงในแถว
                row.cells[4].appendChild(editButton);
                row.cells[5].appendChild(deleteButton);
            });
        })
        .catch(error => {
            console.error('เกิดข้อผิดพลาดในการดึงข้อมูล:', error);
        });
});

function editData(memberId) {
    // ดำเนินการแก้ไขข้อมูลโดยใช้ memberId ในการระบุข้อมูลที่ต้องการแก้ไข
    // คุณสามารถเปิดกล่องโต้ตอบหรือแสดงแบบฟอร์มแก้ไขข้อมูลได้ที่นี่
}

function deleteData(memberId, row) {
    const confirmDelete = confirm('คุณต้องการลบข้อมูลนี้หรือไม่?');

    if (confirmDelete) {
        // ส่ง memberId ไปยัง process.php เพื่อดำเนินการลบข้อมูลในฐานข้อมูล
        fetch('../back/php/process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ memberId: memberId, action: 'delete' }) // ส่ง memberId และ action 'delete'
        })
        .then(response => response.json())
        .then(data => {
            // ตรวจสอบว่าการลบเสร็จสมบูรณ์หรือไม่
            if (data.success) {
                // ลบแถวที่เกี่ยวข้องออกจากตาราง
                row.remove();
                alert('ลบข้อมูลเรียบร้อยแล้ว');
                
                // รีเฟรชหน้าเว็บ
                setTimeout(function () {
                    location.reload();
                }, 100); // รอ 100 มิลลิวินาทีก่อนรีเฟรชหน้า
            } else {
                alert('เกิดข้อผิดพลาดในการลบข้อมูล');
            }
        })
        .catch(error => {
            console.error('เกิดข้อผิดพลาดในการลบข้อมูล:', error);
        });
    }
}




