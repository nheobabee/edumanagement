<?php
session_start();
?>
<title>STUDENT</title>
<?php include('../../config/config.php');

if (!isset($_SESSION['student'])) {
    header('location:../../login/index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/teacher-admin.css">
<?php
if (isset($_GET['idBTL'])) {
    $idBTL = $_GET['idBTL'];

    $sql1 = "SELECT * FROM btl WHERE idBTL = $idBTL ";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameBTL = $row1['nameBTL'];

    $sql0 = "SELECT * FROM btl WHERE idBTL = $idBTL ";
    $res0= mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($res0);
    $note = $row0['note'];
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
                                <a href="./myprofile.php" class="navbar-brand">ACCOUNT</a>
                                <a href="../../login/logout.php" class="navbar-brand">LOGOUT</a>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <div class="container">
                        <br>
                        <div class="header-page">
                            <h1 class="page-title">STUDENT</h1>
                            <!--  -->
                            <?php
                            if (isset($_SESSION['display-username'])) {
                                echo $_SESSION['display-username'];
                            }
                            ?>
                        </div>

                        <?php
                        if (isset($_SESSION['errorDel'])) {
                            echo $_SESSION['errorDel'];
                            unset($_SESSION['errorDel']);
                        }
                        if (isset($_SESSION['successDel'])) {
                            echo $_SESSION['successDel'];
                            unset($_SESSION['successDel']);
                        }

                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <table class="table">
                                    <thead>
                                        <h4>
                                            <?php echo $note ?>
                                        </h4>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * from btlsv where idBTL = '$idBTL'";
                                        $res = mysqli_query($conn, $sql);
                                        $sn = 1;
                                        if ($res == true) {
                                            while ($row = mysqli_fetch_assoc($res)) {

                                                $user_id = $row['user_id'];

                                        ?>
                                                <tr>
                                                    <td>Thành viên: <?php echo $sn++ ?></td>
                                                    <td><?php echo $row['user_id']; ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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