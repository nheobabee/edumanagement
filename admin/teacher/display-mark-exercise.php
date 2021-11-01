<!-- <link rel="stylesheet" href="../../css/teacher-admin.css"> -->
<?php include('./header.php') ?>


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
<?php
if (isset($_GET['idBTVN'], $_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $idBTVN = $_GET['idBTVN'];
}
?>
<br><br>
<div class="all-teacher">
<h1>DANH SÁCH ĐIỂM</h1><br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Tên môn học</th>
            <th scope="col">Điểm</th>
            <th scope="col">Nhận xét</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql0 = "select * from btvn where idBTVN = '$idBTVN'";
        $res0 = mysqli_query($conn, $sql0);
        $row0 = mysqli_fetch_assoc($res0);

        $sql = "SELECT * from ketquabtvn where idBTVN = '$idBTVN'";
        $res = mysqli_query($conn, $sql);


        $sn = 1;
        if ($res == true) {
            while ($row = mysqli_fetch_assoc($res)) {
                $user_id = $row['user_id'];
                $sql2 = "select * from users where user_id = '$user_id'";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
        ?>
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $row2['user_name']; ?></td>
                    <td><?php echo $row0['nameBTVN']; ?></td>
                    <td><?php echo $row['markBTVN']; ?></td>
                    <td><?php echo $row['cmtBTVN']; ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
</div>
<?php include('./footer.php') ?>