<?php
session_start();
?>
<title>STUDENT</title>
<?php include('../config/config.php');

if (!isset($_SESSION['loginok'])) {
    header('location:../login/index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/result-admin.css">

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
                                <a href="../login/logout.php" class="navbar-brand">LOGOUT</a>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <div class="container">
                        <br>
                        <a href="."><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-plus"></i>ADD</i></button></a>
                        <br><br>
                    <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">NameSV</th>
                                    <th scope="col">NameBTVN</th>
                                    <th scope="col">Mark</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * from ketquabtvn";
                                $res = mysqli_query($conn, $sql);
                                $sn = 1;
                                if ($res == true) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $idBTVN = $row['idBTVN'];
                                        $sql3 = "SELECT * FROM btvn WHERE idBTVN = '$idBTVN'";
                                        $res3 = mysqli_query($conn, $sql3);
                                        $row3 = mysqli_fetch_assoc($res3);

                                        $idSV = $row['idSV'];
                                        $sql2 = "SELECT * FROM sinhvien WHERE idSV = '$idSV'";
                                        $res2 = mysqli_query($conn, $sql2);
                                        $row2 = mysqli_fetch_assoc($res2);
                                        
                                ?>
                                        <tr>
                                            <td><?php echo $sn++ ?></td>
                                            <td><?php echo $row2['nameSV']; ?></td>
                                            <td><?php echo $row3['nameBTVN']; ?></td>
                                            <td><?php echo $row['markBTVN']; ?></td>
                                            <td><?php echo $row['cmtBTVN']; ?></td>
                                            <td>
                                                <a href="./upd-result-btvn-admin.php?idBTVN=<?php echo $row['idBTVN']; ?>&&idSV=<?php echo $row['idSV']; ?>"><button type="button" class="btn btn-primary text-white me-2"><i class="fas fa-user-edit"></i></button></a>
                                            </td>

                                            <td>
                                                <a href="./del-result-btvn-admin.php?idBTVN=<?php echo $row['idBTVN']; ?>&&idSV=<?php echo $row['idSV']; ?>"><button type="button" class="btn btn-danger text-white me-2"><i class="fas fa-user-minus"></i></button></a>
                                            </td>
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
<