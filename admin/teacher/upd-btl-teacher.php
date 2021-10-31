<title>UPDATE BTL</title>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['teacher'])) {
    header('location:../../login/index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/add-teacher-admin.css">

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>TEACHER</h2>
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
                <a href="learn-teach-teacher.php"><i class="fas fa-school"></i> Teach - Learn</a>
            </li>


            <li>
                <a href="result-admin.php"><i class="fas fa-poll"></i> Result</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <?php
    // lấy giá trị name cần sửa 
    if (isset($_GET['idBTL'],$_GET['idMH'])) {
        $idBTL = $_GET['idBTL'];
        $idMH = $_GET['idMH'];
        $sql0 = "SELECT * FROM monhoc WHERE idMH = '$idMH'";
        $res0 = mysqli_query($conn, $sql0);
        $row0 = mysqli_fetch_assoc($res0);

        //lấy giá trị từ bảng
        $sqlqq = "SELECT * FROM btl WHERE idBTL = '$idBTL'";
        $kqqq = mysqli_query($conn, $sqlqq);
        if ($kqqq) {
            $rowqq = mysqli_fetch_assoc($kqqq);
            $nameBTL_q = $rowqq['nameBTL'];
            $formatBTL_q = $rowqq['formatBTL'];
            $openedBTL_q = $rowqq['openedBTL'];
            $deadlineBTL_q = $rowqq['deadlineBTL'];
            $idMH_q = $rowqq['idMH'];
            $note_q = $rowqq['notebtl'];
         
        }
    }

    ?>
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
                                <a href="../../login/logout.php" class="navbar-brand">LOGOUT</a>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <div class="container">
                        <h2>CẬP NHẬT BÀI TẬP LỚN</h2>
                        <form method="post">


                        <?php
                            if (isset($_POST['updbtl'])) {
                               
                                $nameBTL_q = $_POST['nameBTL'];
                                $formatBTL_q = $_POST['formatBTL'];
                                $deadlineBTL_q = $_POST['deadlineBTL'];
                                $idMH_q = $_POST['idMH'];
                                $note_q = $_POST['notebtl'];                            
                                
                                $sql3 = "UPDATE `btl` SET 
                                `nameBTL`=' $nameBTL_q',
                                `formatBTL`='$formatBTL_q',                               
                                `deadlineBTL`='$deadlineBTL_q',
                                `notebtl`=' $note_q'                               
                                WHERE idBTL = $idBTL";
                                $res3 = mysqli_query($conn, $sql3);
                                if ($res3 == true) {                                  
                                    header("Location:http://localhost/edumanagement/admin/teacher/btl.php?idMH=".$idMH);
                                } else {
                                    echo 'lỗi';
                                }
                            }
                            ?>
                            <span style="font-weight:500">Môn học: <?php echo $row0['nameMH'] ?><span>
                            <div class="form-group">
                                        <label class="idBTL" for="idMH">Mã bài tập lớn: </label>
                                        <input type="text" class="form-control" id="idBTL" readonly value="<?php echo $idBTL ?>" name="idBTL">
                                    </div>
                            <div class="form-group">
                                <label for="nameBTL">Tên bài tập lớn:</label>
                                <input type="text" class="form-control" id="nameBTL" placeholder="Enter name" name="nameBTL" value="<?php echo  $nameBTL_q ?>">
                            </div>

                            <div class="form-group">
                                        <label for="formatBTL">Hình thức:</label>
                                        <div class="format_btvn">
                                            <select id="formatBTL" name="formatBTL">
                                                <?php
                                                ?>
                                                <option <?php if ($formatBTL_q == 'Trắc nghiệm') {
                                                            echo 'selected';
                                                        } ?> value="Trắc nghiệm">Trắc nghiệm</option>
                                                <option <?php if ($formatBTL_q == 'Tự luận') {
                                                            echo 'selected';
                                                        } ?> value="Tự luận">Tự luận</option>
                                                <?php
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                           
                            <div class="form-group">
                                <label for="deadlineBTL">Hạn cuối:</label>
                                <input type="datetime-local" class="form-control" id="deadlineBTL" placeholder="Enter deadlineBTL" name="deadlineBTL" value="<?php echo $date = date("Y-m-d\TH:i:s", strtotime($deadlineBTL_q));?>">
                            </div>
                            <label for="empEmail" class="col-sm-3 col-form-label">Tệp</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="file" name="file" value="<?php echo $fileName_q ?>">
                                        </div>
                           
                            <div class="form-group">
                                <label for="tenGV">Ghi chú:</label>
                                <input type="text" class="form-control" id="notebtl" placeholder="Enter tenGV" name="notebtl" value="<?php echo $note_q ?>">
                            </div>

                            <br>
                            <button name="updbtl" type="submit" class="btn btn-success"><i class="fas fa-pen"></i> Cập nhật</button>
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