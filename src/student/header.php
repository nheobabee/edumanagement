<title>BTL</title>
<?php include('../config/config.php'); 
        session_start();
        if(!isset($_SESSION['student']))
        {
            header('location:../../login/index.php');
        }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/style-student.css">

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>SINH VIÊN</h2>
            </li>
            <li>
                <a href="student.php"><i class="fas fa-user-graduate"></i> Sinh viên</a>
            </li>
            <li>
                <a href="subject.php"><i class="fas fa-book"></i></i> Môn học</a>
            </li>
            <li>
                <a href="mymark.php"><i class="fas fa-poll"></i> Điểm</a>
            </li>
            <li>
                <a href="contact.php"><i class="fas fa-phone-alt"></i> Liên hệ</a>
            </li>

            <li>
                <a href="chat.php"><i class="fas fa-comment-dots"></i>  Phản hồi</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fas fa-bars"></i></a>

                            <form class="d-flex " style="margin-bottom:0">
                                <a href="./student.php" class="navbar-brand">TRANG CHỦ</a>
                                <a href="./accout.php" class="navbar-brand">TÀI KHOẢN</a>
                                <a href="../login/logout.php" class="navbar-brand">ĐĂNG XUẤT</a>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                           
                        </div>
                      
                    </nav>
                    <div class="main-content">
                    <div class="container">
                         <div class="display-name">
                       <?php
                            if(isset($_SESSION['display-username']))
                            {
                                        echo $_SESSION['display-username'];
                            }
                            ?>
                       </div>