<title>TEACHER</title>
<?php include('../../config/config.php'); 
        session_start();
        if(!isset($_SESSION['loginok']))
        {
            header('location:../../login/index.php');
        }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../../css/upd-teacher-admin.css">

<div id="wrapper">
<?php
    if(isset($_GET['idSV'])){
        $idSV = $_GET['idSV'];
        $sql1 = "SELECT * FROM sinhvien WHERE idSV = '$idSV'";
        $res1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($res1);
        $nameSV = $row1['nameSV'];
        $genderSV = $row1['genderSV'];
        $emailSV = $row1['emailSV'];
        $sdtSV = $row1['sdtSV'];
        $addressSV = $row1['addressSV'];
    }
?>
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
                    <div class="container">
                        <h2>UPDATE STUDENT</h2>
                        <form method="post">
                            <?php
                            if (isset($_POST['add'])) {
                                $nameSV = $_POST['nameSV'];
                                $genderSV = $_POST['genderSV'];
                                $emailSV = $_POST['emailSV'];
                                $sdtSV = $_POST['sdtSV'];
                                $addressSV = $_POST['addressSV'];

                                $sql2 = "UPDATE sinhvien SET
                                    nameSV = '$nameSV',
                                    genderSV = '$genderSV',
                                    emailSV = '$emailSV',
                                    sdtSV = '$sdtSV',
                                    addressSV = '$addressSV'
                                    WHERE idSV = '$idSV'";"
                                    ";
                                $res2 = mysqli_query($conn, $sql2);
                                if ($res2 == true) {
                                    header('location: student.php');
                                  
                                } else {
                                    echo $sql;
                                }
                            }
                            ?>
                            <div class="form-group">
                                <label for="nameSV">Name:</label>
                                <input type="text" class="form-control" id="nameSV" placeholder="Enter name" name="nameSV" value="<?php echo $nameSV ?>">
                            </div>
                            <div class="form-group">
                                <label for="genderGV">Gender:</label>
                                <div class="rdo-genderGV" style="padding-left: 12px;">
                                    <input <?php if($genderSV=="1") {echo "checked";}?> id="genderSV" type="radio" name="genderSV" value="1"> Nam
                                    <input <?php if($genderSV=="0") {echo "checked";}?> id="genderSV" type="radio" name="genderSV" value="0"> Nữ
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emailSV">Email:</label>
                                <input type="email" class="form-control" id="emailSV" placeholder="Enter email" name="emailSV" value="<?php echo $emailSV?>">
                            </div>
                            <div class="form-group">
                                <label for="sdtSV">Phone number:</label>
                                <input type="tel" class="form-control" id="sdtSV" placeholder="Enter phone number" name="sdtSV"  value="<?php echo $sdtSV?>">
                            </div>
                            <div class="form-group">
                                <label for="addressSV">Address:</label>
                                <input type="text" class="form-control" id="addressSV" placeholder="Enter address" name="addressSV"  value="<?php echo $addressSV?>">
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