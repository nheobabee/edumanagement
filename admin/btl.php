<title>DASHBOARD</title>
<?php include('../config/config.php'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/style.css">

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
                <a href=".teach.php"><i class="fas fa-school"></i> Teach</a>
            </li>
            <li>
                <a href="btl.php"><i class="fas fa-users"></i> BTL</a>
            </li>

            <li>
                <a href="result.php"><i class="fas fa-poll"></i> Result</a>
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
                                <a href="" class="navbar-brand">LOGOUT</a>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <div class="main-content">

                        <div class="container">
                       

                            <div class="header-page">
                                <h1 class="page-title">Danh sách bài tập lớn</h1>
                          
                            </div>
                           
                            <br>
                        <a href="./add-btl-admin.php"><button class="btn btn-success"> ADD BTL</button></a>
                        <a href="./dk-btl-admin.php"><button class="btn btn-success"> Đăng ký BTL</button></a>
                        <a href="./add-student-admin.php"><button class="btn btn-success"> Nộp bài</button></a>
                        
                            <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">idBTL</th>
                                    <th scope="col">nameBTL</th>
                                    <th scope="col">formatBTL</th>
                                    <th scope="col">openedBTL</th>
                                    <th scope="col">deadlineBTL</th>
                                    <th scope="col">idMH</th>
                                    <th scope="col">tenGV</th>
                                    <th scope="col">sonhom</th>
                                    <th scope="col">Chi tiết</th>

                                   

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * from btl";
                                $res = mysqli_query($conn, $sql);
                                $sn = 1;
                                if ($res == true) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $idBTL = $row['idBTL'];
                                        $nameBTL = $row['nameBTL'];
                                        $formatBTL = $row['formatBTL'];
                                        $openedBTL = $row['openedBTL'];
                                        $deadlineBTL = $row['deadlineBTL'];
                                        $idMH = $row['idMH'];
                                        $tenGV = $row['tenGV'];
                                        $sonhom = $row['sonhom'];

                                ?>
                                        <tr>
                                            <td><?php echo $row['idBTL']; ?></td>
                                            <td><?php echo $row['nameBTL']; ?></td>
                                            <td><?php echo $row['formatBTL']; ?></td>
                                            <td><?php echo $row['openedBTL']; ?></td>
                                            <td><?php echo $row['deadlineBTL']; ?></td>
                                            <td><?php echo $row['idMH']; ?></td>
                                            <td><?php echo $row['tenGV']; ?></td>
                                            <td><?php echo $row['sonhom']; ?></td>
                                            <td>
                                                <a href="./chitiet-btl-admin.php?idBTL=<?php echo $row['idBTL']; ?>"><button type="button" class="btn btn-primary text-white me-2"><i class="fas fa-info-circle"></i></button></a>
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