<title>BTL</title>
<?php include('../../config/config.php'); 
        session_start();
        if(!isset($_SESSION['loginok']))
        {
            header('location:../../login/index.php');
        }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./sidebar.css">
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];

    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
}
?>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>QUẢN TRỊ VIÊN</h2>
            </li>
            <li>
                <a href="index.php"><i class="fas fa-chart-line"></i> THỐNG KÊ</a>
            </li>
            <li>
                <a href="teacher.php"><i class="fas fa-chalkboard-teacher"></i> GIÁO VIÊN</a>
            </li>
            <li>
                <a href="student.php"><i class="fas fa-user-graduate"></i> SINH VIÊN</a>
            </li>
            <li>
                <a href="subject.php"><i class="fas fa-book"></i> MÔN HỌC</a>
            </li>
            <li>
                <a href="learn-teach-admin.php"><i class="fas fa-school"></i> Giảng dạy - Học tập</a>
            </li>

            <li>
                <a href="result-admin.php"><i class="fas fa-poll"></i> KẾT QUẢ</a>
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
                                <a href="" class="navbar-brand">HOME</a>
                                <a href="./accout.php" class="navbar-brand">ACCOUNT</a>
                                <a href="../../login/logout.php" class="navbar-brand">LOGOUT</a>
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