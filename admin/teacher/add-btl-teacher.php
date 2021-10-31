<title>ADD BTL</title>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['teacher'])) {
    header('location:../../login/index.php');
}
?>
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $sql5 = "SELECT * FROM monhoc WHERE idMH = '$idMH'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $nameMH = $row5['nameMH'];
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/add-btl-tea.css">

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
                    <div class="main-content">

                        <div class="container">
                            
                            <h2>THÊM BÀI TẬP LỚN</h2>
                            <span style="font-weight:500">Môn học: <?php echo $nameMH ?><span>
                            <form method="post" enctype="multipart/form-data">

                                <?php
                                if (isset($_POST['addbtl'])) {

                                    $nameBTL = $_POST['nameBTL'];
                                    $formatBTL = $_POST['formatBTL'];
                                    // $openedBTL = $_POST['openedBTL'];
                                    $deadlineBTL = $_POST['deadlineBTL'];
                                    $idMH = $_POST['idMH'];
                                    $note = $_POST['notebtl'];
                                    $fileName = $_FILES['file']['name'];
                                    $fileTmpName = $_FILES['file']['tmp_name'];
                                    $path = "uploads/" . $fileName;

                                    $sql = "INSERT INTO `btl`( `nameBTL`, `formatBTL`, `deadlineBTL`, `notebtl`, `filenamebtl`, `idMH`)
                                VALUES (' $nameBTL','$formatBTL','$deadlineBTL','$note','$fileName', '$idMH')";
                                    $res = mysqli_query($conn, $sql);
                                    if ($res == true) {
                                        move_uploaded_file($fileTmpName, $path);
                                        header('location: http://localhost/edumanagement/admin/teacher/btl.php?idMH=' . $idMH);
                                    } else {
                                        echo $sql;
                                    }
                                }
                                ?>
                                 <div class="form-group">
                                        <label class="subMH" for="idMH">Mã môn học:</label>
                                        <input type="text" class="form-control" id="idMH" readonly value="<?php echo $idMH ?>" name="idMH">
                                    </div>
                                <div class="form-group">
                                    <label for="nameBTL">Tên bài tập lớn:</label>
                                    <input type="text" class="form-control" id="nameBTL" placeholder="Enter name" name="nameBTL">
                                </div>
                                
                                <div class="form-group">
                                        <label for="formatBTVN">Hình thức:</label>
                                        <div class="format_btvn">
                                            <select id="formatBTL" name="formatBTL">
                                                <option value="Trắc nghiệm">Trắc nghiệm</option>
                                                <option value="Tự luận">Tự luận</option>
                                            </select>
                                        </div>
                                    </div>
                                <!-- <div class="form-group">
                                    <label for="openedBTL">openedBTL:</label>
                                    <input type="date" class="form-control" id="openedBTL" placeholder="Enter openedBTL" name="openedBTL">
                                </div> -->
                                <div class="form-group">
                                    <label for="deadlineBTL">Hạn cuối:</label>
                                    <input type="datetime-local" class="form-control" id="deadlineBTL" placeholder="Enter deadlineBTL" name="deadlineBTL">
                                </div>
                               
                                <label for="empEmail" class="col-sm-3 col-form-label">Đề bài</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" id="file" name="file">
                                </div>
                                <div class="form-group">
                                    <label for="addressSV">Ghi chú:</label>
                                    <input type="text" class="form-control" id="notebtl" placeholder="note" name="notebtl">
                                </div>

                                <br>
                                <button name="addbtl" type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer>
        <p class="ftr text-center">
            QTV - Do your best, the rest will come!
        </p>
    </footer>
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