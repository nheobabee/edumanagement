<?php include('./header.php'); ?>


<?php
$userid = $_SESSION['user_id'];

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
?>

<form action="myprofile.php" method="post" enctype="multipart/form-data">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img id="phongto" class="rounded-circle mt-5" src="./img/<?php echo $row['user_avatar'] ?>" style="width :100px ;height :100px ;">
                    <span class="font-weight-bold"></span>
                    <span class="text-black-50"></span><br>
                    <span><label for="image" class="btn btn-secondary"> Ảnh đại diện</label><input disabled id="image" type="file" name="user_avatar" style="display:none;"></span>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 style="margin-left:110px" class="text-right">Thông tin cá nhân</h4>
                    </div>
                    <div class="row mt-6">
                        <div class="col-md-6"><label class="labels"> Full Name</label>
                            <input disabled name="user_name" type="text" class="form-control" placeholder="Full Name" value="<?php echo $username_q; ?>">
                        </div>
                        <br>
                        <div class="col-md-6"> <label class="labels">Giới tính</label>
                            <div class="form-control">
                                <input disabled <?php if ($usergioitinh_q == 1) {
                                                    echo "checked";
                                                } ?> type="radio" name="user_gioitinh" value="1">
                                <label>Nam</label>
                                <input disabled <?php if ($usergioitinh_q == 0) {
                                                    echo "checked";
                                                } ?> type="radio" name="user_gioitinh" value="0">
                                <label>Nữ</label>

                            </div>
                        </div>
                        <div class="col-md-6"> <label class="labels"> Birthday</label>
                            <input disabled class="form-control" type="date" id="user_birthday" name="user_birthday" value="<?php echo $date = date("Y-m-d", strtotime($userbirthday_q)); ?>">
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Số điện thoại</label>
                            <input disabled name="user_phone" type="text" class="form-control" placeholder="Nhập SDT" value="<?php echo $userphone_q; ?>">
                        </div>

                        <div class="col-md-12"><label class="labels">Email</label>
                            <input disabled name="user_email" type="email" class="form-control" placeholder="nhập email" value="<?php echo $useremail_q; ?>">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <a href="./myprofile.php"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Sửa thông tin
                            </button></a>
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
<?php include('./footer.php'); ?>
<!-- /#wrapper -->
<style>
    body {
        background: #333;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
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