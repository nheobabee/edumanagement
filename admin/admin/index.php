<title>DASHBOARD</title>
<?php include('../../config/config.php'); 
        session_start();
        if(!isset($_SESSION['loginok']))
        {
            header('location:../../login/index.php');
        }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/style.css">

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
                                <a href="./myprofile.php" class="navbar-brand">ACCOUNT</a>
                                <a href="../../login/logout.php" class="navbar-brand">LOGOUT</a>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <div class="main-content">

                        <div class="container">

                            <div class="header-page">
                                <h1 class="page-title">Dashboard</h1>
                                <!--  -->
                            <?php
                            if(isset($_SESSION['display-username']))
                            {
                                        echo $_SESSION['display-username'];
                            }
                            ?>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col text-center">
                                    <?php
                                    $sql1 = "SELECT * FROM users where user_level = 1";
                                    $res1 = mysqli_query($conn, $sql1);
                                    $count1 = mysqli_num_rows($res1);
                                    ?>
                                    <h1 class="count"><?php echo $count1 ?></h1>
                                    <br>
                                    <p>Teacher</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql2 = "SELECT * FROM users where user_level = 2";
                                    $res2 = mysqli_query($conn, $sql2);
                                    $count2 = mysqli_num_rows($res2);
                                    ?>
                                    <h1 class="count"><?php echo $count2 ?></h1>
                                    <br>
                                    <p>Student</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql3 = "SELECT * FROM btvn";
                                    $res3 = mysqli_query($conn, $sql3);
                                    $count3 = mysqli_num_rows($res3);
                                    ?>
                                    <h1 class="count"><?php echo $count3 ?></h1>
                                    <br>
                                    <p>BTVN</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql4 = "SELECT * FROM btl";
                                    $res4 = mysqli_query($conn, $sql4);
                                    $count4 = mysqli_num_rows($res4);
                                    ?>
                                    <h1 class="count"><?php echo $count4 ?></h1>
                                    <br>
                                    <p>BTL</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql5 = "SELECT * FROM monhoc";
                                    $res5 = mysqli_query($conn, $sql5);
                                    $count5 = mysqli_num_rows($res5);
                                    ?>
                                    <h1 class="count"><?php echo $count5 ?></h1>
                                    <br>
                                    <p>Subject</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql6 = "SELECT * FROM ketquabtl, ketquabtvn";
                                    $res6 = mysqli_query($conn, $sql6);
                                    $count6 = mysqli_num_rows($res6);
                                    ?>
                                    <h1 class="count"><?php echo $count6 ?></h1>
                                    <br>
                                    <p>Result</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql7 = "SELECT * FROM users";
                                    $res7 = mysqli_query($conn, $sql7);                                   
                                    $count7 = mysqli_num_rows($res7);
                                    ?>
                                    <h1 class="count"><?php echo $count7 ?></h1>
                                    <br>
                                    <p>Users</p>
                                </div>
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