<title>ADD TEACHER</title>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['loginok'])) {
    header('location:../../login/index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/add-teach-admin.css">


<?php
if (isset($_GET['user_id'])) {
    $user_id1 = $_GET['user_id'];

    $sql0 = "SELECT * FROM relationship WHERE user_id = '$user_id1'";
    $res0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($res0);
    $idMH1 = $row0['idMH'];
    $sql1 = "SELECT * FROM monhoc WHERE idMH = '$idMH1'";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH1 = $row1['nameMH'];

    $sql2 = "SELECT * FROM users WHERE user_id = '$user_id1'";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $user_name1 = $row2['user_name'];
}
?>
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
                <a href="learn-teach-admin.php"><i class="fas fa-school"></i> Teach - Learn</a>
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
                        <h2>CẬP NHẬT SINH VIÊN</h2>
                        <form class="form-add" method="post">
                            <?php


                            if (isset($_POST['add'])) {
                                $user_id =  $_POST['user_id'];
                                $idMH = $_POST['idMH'];
                                // Bước 2 câu lệnh truy vấn
                                $sql7 = "UPDATE relationship SET 
                                idMH = '$idMH'
                                where user_id = '$user_id'
                                ";


                                $result7 = mysqli_query($conn, $sql7);

                                if ($result7 > 0) {
                                    echo "Bản ghi đã được lưu";
                                    header("Location: http://localhost/edumanagement/admin/admin/learn.php");
                                } else {
                                    echo "Lỗi";
                                }
                            }

                            ?>
                            <?php
                            // lấy giá trị user cần sửa 


                            ?>
                            <div class="form-group ">
                                <label style="display: inline" for="idMH" class="col-sm-2 col-form-label">Tên sinh viên:</label>
                                <div class="col-sm-10">
                                    <select name="user_id">
                                        <?php
                                        $sql4 = "SELECT * FROM users WHERE user_id = '$user_id1'";
                                        $result4 = mysqli_query($conn, $sql4);
                                        //  if (sqlsrv_num_rows($result) > 0) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $user_id = $row4['user_id'];
                                            $user_name = $row4['user_name'];
                                        ?>
                                            <option <?php if ($user_id1 == $user_id) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $user_id; ?>"><?php echo $user_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                   </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label style="display: inline" for="idMH" class="col-sm-2 col-form-label">Tên môn học</label>
                                <div class="col-sm-10">
                                    <select name="idMH">
                                        <?php
                                        $sql5 = "SELECT * FROM monhoc";
                                        $result5 = mysqli_query($conn, $sql5);
                                        //  if (sqlsrv_num_rows($result) > 0) {
                                        while ($row5 = mysqli_fetch_assoc($result5)) {
                                            $idMH = $row5['idMH'];
                                            $nameMH = $row5['nameMH'];
                                        ?>
                                            <option <?php if ($idMH1 == $idMH) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $idMH; ?>"><?php echo $nameMH; ?></option>
                                        <?php
                                        }
                                        ?>
                                   </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <input hidden type="text" class="form-control" id="note" placeholder="Ghi chú" name="note" value="1">
                            </div>
                            <br>
                            <button name="add" type="submit" class="btn btn-success"><i class="fas fa-pen"></i> Cập nhật</button>
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