<title>DASHBOARD</title>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['loginok'])) {
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
                    <?php
                    $userid = $_SESSION['user_id'];

                    if (isset($_POST['btn-luu'])) {
                        $username = $_POST['user_name'];
                        $useravatar = $_FILES['user_avatar']['name'];
                        $usergioitinh = $_POST['user_gioitinh'];
                        $userbirthday = $_POST['user_birthday'];
                        $userphone = $_POST['user_phone'];
                        $useremail = $_POST['user_email'];
                        if ($useravatar != null) {
                            $path = "./img/";
                            $tmp_name = $_FILES['user_avatar']['tmp_name'];
                            move_uploaded_file($tmp_name, $path . $useravatar);
                        }
                        
                        // Bước 2 câu lệnh truy vấn
                        $sql1 = "UPDATE `users` SET 
                        `user_name`='$username',
                        `user_avatar`='$useravatar',
                        `user_gioitinh`='$usergioitinh',
                        `user_birthday`='$userbirthday',
                        `user_phone`='$userphone',
                        `user_email`='$useremail'
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
                    if (isset($_SESSION['user_id'])) {
                        $userid = $_SESSION['user_id'];

                        //lấy giá trị từ bảng
                        $sql = "SELECT * FROM users WHERE user_id = '$userid'";
                        $kq = mysqli_query($conn, $sql);
                        if ($kq) {
                            $row = mysqli_fetch_assoc($kq);
                            $username_q = $row['user_name'];
                            $useravatar_q = $row['user_avatar'];
                            $usergioitinh_q = $row['user_gioitinh'];
                            $userbirthday_q = $row['user_birthday'];
                            $userphone_q = $row['user_phone'];
                            $useremail_q = $row['user_email'];
                        }
                    }
                     echo $row['user_avatar'];
                    ?>
                       
                    <div class="main-content">
                        <div class="container">
                        </div>
                        <form action="myprofile.php" method="post" enctype="multipart/form-data">
                            <div class="container rounded bg-white mt-5 mb-5">
                                <div class="row">
                                    <div class="col-md-4 border-right">
                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                            <img id="phongto" class="rounded-circle mt-5" src="./img/<?php echo $row['user_avatar']?>" style="width :100px ;height :100px ;">
                                            <span class="font-weight-bold"></span>
                                            <span class="text-black-50"></span><br>
                                            <span><label for="image" class="btn btn-secondary">Tải ảnh đại diện</label><input id="image" type="file" name="user_avatar" style="display:none;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-7 border-right">
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 style="margin-left:110px" class="text-right">Thông tin cá nhân</h4>
                                            </div>
                                            <div class="row mt-6">
                                                <div class="col-md-6"><label class="labels"> Full Name</label>
                                                    <input name="user_name" type="text" class="form-control" placeholder="Full Name" value="<?php echo $username_q; ?>">
                                                </div>
                                                <br>
                                                <div class="col-md-6"> <label class="labels">Giới tính</label>
                                                    <div class="form-control">
                                                        <input <?php if ($usergioitinh_q == 1) {
                                                                    echo "checked";
                                                                } ?> type="radio" name="user_gioitinh" value="1">
                                                        <label>Nam</label>
                                                        <input <?php if ($usergioitinh_q == 0) {
                                                                    echo "checked";
                                                                } ?> type="radio" name="user_gioitinh" value="0">
                                                        <label>Nữ</label>

                                                </div>
                                            </div>
                                            <div class="col-md-6"> <label class="labels"> Birthday</label>
                                                <input class="form-control" type="date" id="user_birthday" name="user_birthday" value="<?php echo $date = date("Y-m-d", strtotime($userbirthday_q)); ?>">
                                            </div>

                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12"><label class="labels">Số điện thoại</label>
                                                <input name="user_phone" type="text" class="form-control" placeholder="Nhập SDT" value="<?php echo $userphone_q; ?>">
                                            </div>

                                            <div class="col-md-12"><label class="labels">Email</label>
                                                <input name="user_email" type="email" class="form-control" placeholder="nhập email" value="<?php echo $useremail_q; ?>">
                                            </div>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Lưu
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn lưu không ?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                            <button type="submit" class="btn btn-primary" name="btn-luu">Lưu</button>
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
            </div>
        </div>
        </form>
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
<style>
    body {
        background: #333;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .btn-primary {
        width: 20%;

    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 15px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }

    .col-md-6 {
        margin-top: 10px;
    }

    .col-md-12 {
        margin-top: 10px;
    }

    #phongto {
        transition: all 1s ease;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
    }

    #phongto:hover {
        transform: scale(2.5, 2.5);
        -webkit-transform: scale(2.5, 2.5);
        -moz-transform: scale(2.5, 2.5);
        -o-transform: scale(2.5, 2.5);
        -ms-transform: scale(2.5, 2.5);
    }
</style>