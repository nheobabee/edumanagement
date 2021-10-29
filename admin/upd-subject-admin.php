<title>TEACHER</title>
<?php include('../config/config.php'); 
        session_start();
        if(!isset($_SESSION['loginok']))
        {
            header('location:../login/index.php');
        }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/add-teacher-admin.css">
<?php
    if(isset($_GET['idMH'])){
        $idMH = $_GET['idMH'];
        $sql1 = "SELECT * FROM monhoc WHERE idMH = '$idMH'";
        $res1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($res1);
        $nameMH = $row1['nameMH'];
        $TC = $row1['TC'];
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
                                <a href="../login/logout.php" class="navbar-brand">LOGOUT</a>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <div class="container">
                        <h2>UPDATE SUBJECT</h2>
                        <form method="post">
                            <?php
                            if (isset($_POST['add'])) {
                                $nameMH = $_POST['nameMH'];
                                $TC = $_POST['TC'];

                                $sql2 = "UPDATE monhoc
                                    SET nameMH = N'$nameMH',
                                    TC = '$TC'
                                    WHERE idMH = '$idMH'";"                                    
                                    ";
                                $res2 = mysqli_query($conn, $sql2);
                                if ($res2 == true) {
                                    header('location: subject.php');
                                    
                                } else {
                                    echo $sql2;
                                }
                            }
                            ?>
                              <div class="form-group">
                                <label for="nameMH">ID Subject:</label>
                                <input type="text" class="form-control" id="idMH" readonly placeholder="Enter name" name="idMH" value="<?php echo $idMH ?>">
                            </div>

                            <div class="form-group">
                                <label for="nameMH">Name:</label>
                                <input type="text" class="form-control" id="nameMH" placeholder="Enter name" name="nameMH" value="<?php echo $nameMH ?>">
                            </div>
                           
                            <div class="form-group">
                                <label for="TC">Credits:</label>
                                <input type="number" 
                                 class="form-control" id="TC" placeholder="Enter credits" name="TC" value="<?php echo $TC ?>">
                            </div>
                        
                            <br>
                            <button name="add" type="submit" class="btn btn-success">UPDATE</button>
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