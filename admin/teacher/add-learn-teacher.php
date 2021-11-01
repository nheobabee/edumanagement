<?php include('./header.php') ?>
<br><br>
<div class="form-add">

<h2>THÊM SINH VIÊN</h2>
<form  method="post">
    <?php


    if (isset($_POST['add'])) {
        $user_id =  $_POST['user_id'];
        $idMH = $_POST['idMH'];
        $note = $_POST['note'];
        // Bước 2 câu lệnh truy vấn
        $sql0 = "INSERT INTO relationship values ('$user_id','$idMH','$note')";


        $result0 = mysqli_query($conn, $sql0);

        if ($result0 > 0) {
            echo "Bản ghi đã được lưu";
            header("Location: http://localhost/edumanagement/admin/teacher/learn-teacher.php");
        } else {
            echo "<p style='margin:0' class='error'>Sinh viên đang học môn này!</p>";
        }
    }

    ?>
    <?php
    // lấy giá trị user cần sửa 


    ?>
    <div class="form-group ">
        <label style="display: inline" for="idMH" class="col-sm-2 col-form-label">Tên sinh viên:</label>
        <div class="col-sm-10">
            <select name="user_id">
                <?php
                $sql1 = "SELECT * FROM users WHERE user_level= 0 ";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        echo '<option value="' . $row1['user_id'] . '">' . $row1['user_name'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group ">
        <label style="display: inline" for="idMH" class="col-sm-2 col-form-label">Tên môn học:</label>
        <div class="col-sm-10">
            <select name="idMH">
                <?php
                $sql2 = "SELECT * FROM monhoc";
                $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        echo '<option value="' . $row2['idMH'] . '">' . $row2['nameMH'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">

        <input hidden type="text" class="form-control" id="note" placeholder="Ghi chú" name="note" value="0">
    </div>
    <br>
    <button name="add" type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</button>
</form>
</div>
<?php include('./footer.php') ?>