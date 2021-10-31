<title>VIEW EXCERCISE</title>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['teacher'])) {
    header('location:../../login/index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/v-btvnsv.css">
<?php
if (isset($_GET['idBTVN'], $_GET['idMH'])) {
    $idBTVN = $_GET['idBTVN'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
    $sql2 = "SELECT * FROM btvn WHERE  idBTVN = $idBTVN";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $nameBTVN = $row2['nameBTVN'];
    
    
}

    
    // $sql4 = "SELECT * FROM btvn WHERE  user_id = $row3";
    // $res4 = mysqli_query($conn, $sql4);
    // $row4 = mysqli_fetch_assoc($res4);
    // $user_name = $row4['user_name'];

?>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>ADMIN</h2>
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
                            <br><br>
                            <div class="tittle-mh">
                               <h3><?php echo $nameMH ?></h3>
                               <h5><?php echo $nameBTVN?></h5>
                            </div>
                            <?php
                            $sql3 = "SELECT * FROM btvnsv WHERE idMH = '$idMH' AND idBTVN = '$idBTVN'";
                            $res3 = mysqli_query($conn, $sql3);
                            
                            while ($row3 = mysqli_fetch_assoc($res3)) { 
                                    $user_id = $row3['user_id'];
                                    $sql0 = "Select * from users where user_id = '$user_id'";
                                    $res0 = mysqli_query($conn, $sql0);
                                    $row0 = mysqli_fetch_assoc($res0);
                                ?>
                                <div class="title-btvn">

                                    <div class="name-btvn row">

                                        <div class="content-btvn col">
                                            <h6><?php echo $row3['user_id'] ?>. <?php echo $row0['user_name'] ?></h6>
                                            <div class="form-group">
                                                <a href="download-btvnsv.php?file=<?php echo $row3['fileBTVN'] ?>"> <button class="btn btn-success text-white me-2"><i class="fas fa-download"></i>Tải và xem bài làm</button></a><br>
                                            </div>

                                        </div>
                                    </div>
                                   
                                </div>
                            <?php
                            }

                            ?>


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