<!-- <link rel="stylesheet" href="../../css/add-teacher-admin.css"> -->
<?php include('./header.php') ?>
<h2>THÊM GIÁO VIÊN</h2>
<form class="form-add" method="post">
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
            header('Location: teacher.php');
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
        <label style="display: inline" for="idMH" class="col-sm-2 col-form-label">Tên người dùng:</label>
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
    </div>
    <div class="form-group">
        <label style="margin:3px 0" for="`user_level">Chức vụ: Giáo viên</label>
        <input hidden type="text" class="form-control" id="user_level" placeholder="Enter chức vụ" name="user_level" value="1">
    </div>
    <br>
    <button name="add" type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</button>
</form>
<?php include('./footer.php') ?>