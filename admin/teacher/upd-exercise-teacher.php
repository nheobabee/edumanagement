<title>UPDATE EXERCISE</title>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['teacher'])) {
    header('location:../../login/index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/add-exercise-admin.css">
<?php
if (isset($_GET['idBTVN'], $_GET['idMH'])) {
    $idBTVN = $_GET['idBTVN'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM btvn where idBTVN = $idBTVN and idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $idBTVN = $row1['idBTVN'];
    $nameBTVN = $row1['nameBTVN'];
    $formatBTVN1 = $row1['formatBTVN'];
    $deadlineBTVN = $row1['deadlineBTVN'];
    $fileName_q = $row1['filename'];
    $note = $row1['note'];


    $sql2 = "SELECT * FROM monhoc where idMH = $idMH";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $nameMH = $row2['nameMH'];
}
?>
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

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
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
                        <div class="tittleAdd">
                            <h2>CẬP NHẬT BÀI TẬP</h2>
                        </div>
                        <form method="post">
                            <?php
                            if (isset($_POST['add'])) {

                                $nameBTVN = $_POST['nameBTVN'];
                                $formatBTVN = $_POST['formatBTVN'];
                                $deadlineBTVN = $_POST['deadlineBTVN'];
                                $fileName = $_FILES['file']['name'];
                                $fileTmpName = $_FILES['file']['tmp_name'];
                                $path = "uploads/".$fileName;
                                $note = $_POST['note'];

                                $sql3 = "UPDATE `btvn` SET `nameBTVN`='$nameBTVN',
                                `formatBTVN`=' $formatBTVN',
                                `deadlineBTVN`=' $deadlineBTVN',
                                `note`='$note',
                                `filename`='$fileName'
                                
                                WHERE idBTVN = '$idBTVN'
                                 ";
                                $res3 = mysqli_query($conn, $sql3);
                                if ($res3 == true) {
                                    header("Location:http://localhost/edumanagement/admin/teacher/exercise-subject-teacher.php?idMH=" . $idMH);
                                } else {
                                    echo $sql3;
                                }
                            }
                            ?>
                            <span style="font-weight:500">Môn học: <?php echo $nameMH ?><span>
                                    <div class="form-group">
                                        <label class="idBTVN" for="idMH">Mã bài tập: </label>
                                        <input type="text" class="form-control" id="idBTVN" readonly value="<?php echo $idBTVN ?>" name="idBTVN">
                                    </div>
                                    <div class="form-group">
                                        <label for="nameBTVN">Tên bài tập:</label>
                                        <input type="text" class="form-control" id="nameBTVN" placeholder="Enter name" name="nameBTVN" value="<?php echo $nameBTVN ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formatBTVN">Hình thức:</label>
                                        <div class="format_btvn">
                                            <select id="formatBTVN" name="formatBTVN">
                                                <?php
                                                ?>
                                                <option <?php if ($formatBTVN1 == 'Trắc nghiệm') {
                                                            echo 'selected';
                                                        } ?> value="Trắc nghiệm">Trắc nghiệm</option>
                                                <option <?php if ($formatBTVN1 == 'Tự luận') {
                                                            echo 'selected';
                                                        } ?> value="Tự luận">Tự luận</option>
                                                <?php
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                <label for="openedBTVN">Opened:</label>
                                <input type="date" class="form-control" id="openedBTVN" placeholder="Enter opened" name="openedBTVN">
                            </div> -->



                                    <div class="form-group">
                                        <label for="deadlineBTVN">Hạn cuối:</label>
                                        <div class="deadline-BTVN">
                                            <input type="datetime-local" name="deadlineBTVN" id="deadlineBTVN" value="<?php echo $date = date("Y-m-d\TH:i:s", strtotime($deadlineBTVN)); ?>">
                                        </div>
                                        <label for="empEmail" class="col-sm-3 col-form-label">Tệp</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="file" name="file" value="<?php echo $fileName_q ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Ghi chú:</label>
                                        <input type="text" class="form-control" id="note" placeholder="Enter note" name="note" value="<?php echo $note ?>">
                                    </div>
                                    
                                    <button style="margin-top:10px" name="add" type="submit" class="btn btn-success"><i class="fas fa-pen"></i> Cập nhật</button>
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