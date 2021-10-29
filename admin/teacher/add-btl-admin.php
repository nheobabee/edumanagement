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
echo $nameMH;
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/add-teacher-admin.css">

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
                <a href="teach.php"><i class="fas fa-school"></i> Teach</a>
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
                        <h2>ADD BTL</h2>
                        <form method="post">
                            <?php
                            if (isset($_POST['addbtl'])) {

                                $nameBTL = $_POST['nameBTL'];
                                $formatBTL = $_POST['formatBTL'];
                                // $openedBTL = $_POST['openedBTL'];
                                $deadlineBTL = $_POST['deadlineBTL'];
                                $idMH = $_POST['idMH'];
                                $note = $_POST['notebtl'];


                                $sql = "INSERT INTO `btl`( `nameBTL`, `formatBTL`,  `deadlineBTL`, `idMH`, `notebtl`) 
                                VALUES (' $nameBTL','$formatBTL','$deadlineBTL',' $idMH ','$note')";
                                $res = mysqli_query($conn, $sql);
                                if ($res == true) {
                                    header('location: subject.php');
                                } else {
                                    echo $sql;
                                }
                            }
                            ?>
                            <div class="form-group">
                                <label for="nameBTL">Name BTL:</label>
                                <input type="text" class="form-control" id="nameBTL" placeholder="Enter name" name="nameBTL">
                            </div>

                            <div class="form-group">
                                <label for="formatBTL">formatBTL:</label>
                                <input type="text" class="form-control" id="formatBTL" placeholder="Enter formatBTL" name="formatBTL">
                            </div>
                            <!-- <div class="form-group">
                                    <label for="openedBTL">openedBTL:</label>
                                    <input type="date" class="form-control" id="openedBTL" placeholder="Enter openedBTL" name="openedBTL">
                                </div> -->
                            <div class="form-group">
                                <label for="deadlineBTL">deadlineBTL:</label>
                                <input type="datetime-local" class="form-control" id="deadlineBTL" placeholder="Enter deadlineBTL" name="deadlineBTL">
                            </div>
                            <div class="form-group ">
                                <label for="idMH" class="col-sm-2 col-form-label">Tên môn học:</label>                           
                                <div class="col-sm-10">
                                    <select name="idMH">
                                        <?php
                                        $sqlq = "SELECT * FROM monhoc WHERE idMH = $idMH   ";
                                        $resultq = mysqli_query($conn, $sqlq);
                                        if (mysqli_num_rows($resultq) > 0) {
                                            while ($row = mysqli_fetch_assoc($resultq)) {
                                                echo '<option value="' . $idMH . '">' . $row['nameMH'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="addressSV">Ghi chú:</label>
                                <input type="text" class="form-control" id="notebtl" placeholder="note" name="notebtl">
                            </div>

                            <br>
                            <button name="addbtl" type="submit" class="btn btn-success">ADD BTL</button>
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