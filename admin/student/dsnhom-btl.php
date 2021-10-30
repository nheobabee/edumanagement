<title>TEAM LIST</title>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['student'])) {
    header('location:../../login/index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/list-dk-btl.css">
<?php
if (isset($_GET['idBTL'])) {
    $idBTL = $_GET['idBTL'];

    $sql1 = "SELECT * FROM btl WHERE idBTL = $idBTL ";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameBTL = $row1['nameBTL'];
}
?>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>STUDENT</h2>
            </li>
            <li>
                <a href="student.php"><i class="fas fa-user-graduate"></i> Student</a>
            </li>
            <li>
                <a href="subject.php"><i class="fas fa-book"></i> Subject</a>
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

                            <div class="tittle-mh">
                                <h1><?php echo $nameBTL ?></h1>
                            </div>
                            <?php
                            $sql3 = "SELECT * FROM btlsv WHERE idBTL = $idBTL";
                            $sql4 = "SELECT * FROM btlsv WHERE idBTL = $idBTL";
                            $res4 = mysqli_query($conn,$sql4);
                            $res3 = mysqli_query($conn, $sql3);
                            $row4 = mysqli_fetch_assoc($res4)
                            ?>
                            <?php

                            if ($res3 == true) {
                                
                            ?>
                                <h2 style="color:darkgrey"><?php echo $row4['note'] ?></h2>
                                <?php
                                $i = 1;
                                while ($row3 = mysqli_fetch_assoc($res3)) {  
                                    $user_id = $row3['user_id'];
                                    $sql6 = "SELECT * FROM users WHERE user_id = $user_id";
                                    $res6 = mysqli_query($conn,$sql6);
                                    $row6 = mysqli_fetch_assoc($res6);

                                ?>
                                
                                    <p><span style="font-weight: 500;">Thành viên <?php echo $i ?>: </span><?php echo $row6['user_name'] ?></p>
                                <?php
                                    $i++;
                                } ?>
                                <p class="note"><?php echo $row1['nameBTL'] ?></p>
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