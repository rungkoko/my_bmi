<div class="navbar navbar-expand-lg navbar-success bg-success fixed-top">
        <div class="container">
            <a href="index.html" class="navbar-brand">
                <img src="https://cdn.discordapp.com/attachments/404512475183316993/1141087093867696178/36c8a8458b87f669.png" width="80" height="80" alt="Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Your menu items here -->
                </ul>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    <li class="nav-item"><a href="index.html" class="nav-link px-2 text-white">&nbsp;&nbsp;หน้าหลัก&nbsp;&nbsp;</a></li>
    
    <!-- Add a dropdown navigation item -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle px-2 text-white" id="childDataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            กรอกประวัติข้อมูล
        </a>
        <ul class="dropdown-menu slide-down" aria-labelledby="childDataDropdown">
            <li><a class="dropdown-item" href="information_kids.html">กรอกข้อมูลเด็ก</a></li>
            <li><a class="dropdown-item" href="#">กรอกข้อมูลผู้ใหญ่</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
    </li>

    <li class="nav-item"><a href="calculate_page.html" class="nav-link px-2 text-white">การคำนวนการเจริญเติบโต</a></li>
    <li class="nav-item"><a href="Instruction.html" class="nav-link px-2 text-white">คู่มือการใช้งาน</a></li>
    <li class="nav-item"><a href="#second" class="nav-link px-2 text-white">ติดต่อ</a></li>

</ul>

<form id="searchForm" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
    <input type="search" id="searchInput" class="form-control form-control-dark text-bg-light" placeholder="Search..." aria-label="Search">
</form>



    <div class="text-end">

    <?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo '<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
    Welcome, ' . htmlspecialchars($_SESSION['username']) . '!
  </button>
  
              <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                ';
    
    // เพิ่มหัวข้อเพิ่มเติมเมื่อล็อกอินเป็น "admin"
    if ($_SESSION['username'] === 'admin') {
        echo '<li><a class="dropdown-item" href="../my_bmi/back/index.html">Admin Panel</a></li>';
    }
    
    echo '<li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
              </ul>
          </div>';
} else {
    echo '<button type="button" class="btn btn-outline-light me-2" fdprocessedid="rwagj8" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>';
    echo '<button type="button" class="btn btn-warning text-brown me-2" fdprocessedid="rwagj8" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>';
}
?>


</div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var dropdownLink = document.getElementById("childDataDropdown");
    var dropdownMenu = document.querySelector(".slide-down");

    dropdownLink.addEventListener("mouseover", function() {
        dropdownMenu.classList.add("show");
        dropdownMenu.style.animation = "slide-down 0.5s ease-in-out forwards";
    });

    dropdownMenu.addEventListener("mouseleave", function() {
        dropdownMenu.style.animation = "slide-up 0.5s ease-in-out forwards";
        setTimeout(function() {
            dropdownMenu.classList.remove("show");
        }, 500);
    });
});
</script>
