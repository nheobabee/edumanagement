<title>TEACHER</title>
<?php include('../config/config.php'); 
        session_start();
        if(!isset($_SESSION['loginok']))
        {
            header('location:../login/index.php');
        }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/add-teacher-admin.css">

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>ADMIN</h2>
            </li>
            <li>
                <a href="index.php"><i class="fas fa-chart-line"></i> Dashboard</a>
            </li>
            <li>
                <a href="teacher.php"><i class="fas fa-chalkboard-teacher"></i> Teacher</a>
            </li>
            <li>
                <a href="student.php"><i class="fas fa-user-graduate"></i> Student</a>
            </li>
            <li>
                <a href="subject.php"><i class="fas fa-book"></i> Subject</a>
            </li>
            <li>
                <a href=".teach.php"><i class="fas fa-school"></i> Teach</a>
            </li>

            <li>
                <a href="result.php"><i class="fas fa-poll"></i> Result</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="_P$_POST">
                <div class="col-lg-12">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fas fa-bars"></i></a>

                            <form class="d-flex">
                                <a href="" class="navbar-brand">HOME</a>
                                <a href="" class="navbar-brand">ACCOUNT</a>
                                <a href="../login/logout.php" class="navbar-brand">LOGOUT</a>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <div class="container">
                        <h2>Đăng kí bài tập lớn</h2>
                        <form method="post">
                            <?php
                            if (isset($_POST['dkbtl'])) {

                                $nameTeam = $_POST['nameTeam'];
                                $nameST1 = $_POST['nameST1'];
                                $nameST2 = $_POST['nameST2'];
                                $nameST3 = $_POST['nameST3'];
                                $idBTL = $_POST['idBTL'];


                                $sql = "INSERT INTO `btlsv`(`idTeam`, `nameTeam`, `nameST1`, `nameST2`, `nameST3`, `idBTL`) 
                                VALUES ('','$nameTeam','$nameST1',' $nameST2','$nameST3','$idBTL')";
                                $res = mysqli_query($conn, $sql);
                                if ($res == true) {
                                    header('location: subject.php');
                                } else {
                                    echo 'Lỗi';
                                    echo $sql;
                                }
                            }
                            ?>
                             <?php
                            // lấy giá trị name của bài tập lớn
                            if (isset($_GET['idBTL'])) {
                                $idBTL = $_GET['idBTL'];

                                //lấy giá trị từ bảng
                                $sqll = "SELECT * FROM btl WHERE idBTL = '$idBTL'";
                                $kql = mysqli_query($conn, $sqll);
                                if ($kql) {
                                    $row = mysqli_fetch_assoc($kql);
                                    $nameBTL_q = $row['nameBTL'];
                                
                                }
                            }
                            ?>

                            <div class="form-group">
                                <label for="nameBTL">Tên nhóm:</label>
                                <input type="text" class="form-control" id="nameTeam" placeholder="Enter name" name="nameTeam">
                            </div>

                            <div class="form-group">
                                <label for="nameST1">Tên thành viên 1:</label>
                                <input type="text" class="form-control" id="nameST1" placeholder="Enter name" name="nameST1">
                            </div>
                            <div class="form-group">
                                <label for="nameST2">Tên thành viên 2:</label>
                                <input type="text" class="form-control" id="nameST2" placeholder="Enter name" name="nameST2">
                            </div>
                            <div class="form-group">
                                <label for="nameST3">Tên thành viên 3:</label>
                                <input type="text" class="form-control" id="nameST3" placeholder="Enter name" name="nameST3">
                            </div>
                             <div class="form-group">
                                <label for="nameST3">Tên BTL:</label>
                                <span><?php echo $nameBTL_q?></span>
                                <input readonly type="text" class="form-control" id="idBTL" placeholder="Enter name" name="idBTL" value="<?php echo $idBTL ?>">
                            </div> 
                            
                           
                            </div>
                            <br>
                            <button name="dkbtl" type="submit" class="btn btn-success">Đăng kí</button>
                        </form>
                    </div>
                </div>
                <footer>
                    <p class="ftr text-center">
                        QTV - Do your best, the rest will come!
                    </p>
                </footer>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </div>
    <!-- /#wrapper -->