<title>DASHBOARD</title>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['teacher'])) {
    header('location:../../login/index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/view-exercise-admin.css">
<?php
if (isset($_GET['idBTVN'], $_GET['idMH'])) {
    $idBTVN = $_GET['idBTVN'];
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
                            <br>
                            <a href="./add-exercise-admin.php?idMH=<?php echo $idMH; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-plus"></i>ADD EXCERCISE</button></a>
                            <br><br>
                            <div class="tittle-mh">
                                <h2><?php echo $nameMH ?></h2>
                            </div>
                            <?php
                            $sql3 = "SELECT * FROM btvn WHERE idMH = '$idMH'";
                            $res3 = mysqli_query($conn, $sql3);

                            $row3 = mysqli_fetch_assoc($res3)

                            ?>
                            <div class="title-btvn">

                                <div class="name-btvn row">

                                    <div class="content-btvn col">
                                        <h6><?php echo $row3['nameBTVN'] ?></h6>
                                        <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTVN'] ?></p>
                                        <p style="border-bottom: 1px solid;"><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTVN'] ?></p>
                                        <p class="note"><?php echo $row3['note'] ?></p>
                                       <div class="form-tn">
                                       <a href="./question.php?idMH=<?php echo $idMH ?>"><button type="button" class="btn btn-info text-white me-2"><i class="fas fa-upload"></i> Trắc nghiệm</button></a>
                                       </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label"></label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <a href="./exercise-subject-admin.php?idMH=<?php echo $idMH ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-upload"></i> SEND</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="">
    <footer>
        <p class="ftr text-center">
            QTV - Do your best, the rest will come!
        </p>
    </footer>
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