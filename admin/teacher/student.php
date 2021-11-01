<?php include('./header.php') ?>
<br><br>
<div class="all-teacher">
<h1>DANH SÁCH SINH VIÊN</h1>
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
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Email</th>
            <th scope="col">SĐT</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * from users where user_level = 0";
        $res = mysqli_query($conn, $sql);
        $sn = 1;
        if ($res == true) {
            while ($row = mysqli_fetch_assoc($res)) {
                $user_gioitinh = $row['user_gioitinh'];
                $user_id = $row['user_id'];
        ?>
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td>
                        <?php if ($user_gioitinh == 1) {
                            echo 'Nam';
                        }
                        if ($user_gioitinh == 0) {
                            echo 'Nữ';
                        }
                        ?>
                    </td>
                    <td><?php echo $row['user_birthday']; ?></td>
                    <td><?php echo $row['user_phone']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>

                    <td>
                        <a href="./del-student-teacher.php?user_id=<?php echo $row['user_id']; ?>"><button type="button" class="btn btn-danger text-white me-2"><i class="fas fa-user-minus"></i></button></a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
</div>
<?php include('./footer.php') ?>