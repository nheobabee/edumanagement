<title>ADD TEACHER</title>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['loginok'])) {
    header('location:../../login/index.php');
}
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
                        <h2>ADD TEACHER</h2>
                        <form method="post">
                            <?php
                            

                            if (isset($_POST['add'])) {     
                                $userid =  $_POST['user_id'];                    
                                $userlevel = $_POST['user_level'];
                                // Bước 2 câu lệnh truy vấn
                                $sql1 = "UPDATE `users` SET 
                                `user_level`='$userlevel'
                                 WHERE `user_id`='$userid'";

                                $result1 = mysqli_query($conn, $sql1);

                                if ($result1 > 0) {
                                    echo "Bản ghi đã được lưu";
                                    header('Location: index.php');
                                    die();
                                } else {
                                    echo "Lỗi";
                                }
                            }

                            ?>
                            <?php
                            // lấy giá trị user cần sửa 
                          
                            
                            ?>
                            <div class="form-group ">
                                <label for="idMH" class="col-sm-2 col-form-label">Tên người dùng:</label>
                                <div class="col-sm-10">
                                    <select name="user_id">
                                        <?php
                                        $sqlq = "SELECT * FROM users WHERE user_level= 0 ";
                                        $resultq = mysqli_query($conn, $sqlq);
                                        if (mysqli_num_rows($resultq) > 0) {
                                            while ($row = mysqli_fetch_assoc($resultq)) {
                                                echo '<option value="' . $row['user_id'] . '">' . $row['user_name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="`user_level">Chức vụ:</label>
                                    <input type="text" class="form-control" id="user_level" placeholder="Enter chức vụ" name="user_level">
                                </div>
                               
                                <br>
                                <button name="add" type="submit" class="btn btn-success">ADD</button>
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