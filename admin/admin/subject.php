<!-- <link rel="stylesheet" href="../../css/sj-stu.css"> -->
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
<h1>DANH SÁCH MÔN HỌC</h1>
<a href="./add-subject-admin.php"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-plus"></i> Thêm môn học</button></a>
<br><br><br>
<?php
?>

<div class="folder-subject">
    <?php
    $sql3 = "SELECT * FROM monhoc ";
    $res3 = mysqli_query($conn, $sql3);
    if ($res3 == true) {
        while ($row3 = mysqli_fetch_assoc($res3)) {
    ?>
            <div class="subject-folder text-center">
                <a href="view-subject-admin.php?idMH=<?php echo $row3['idMH'] ?>"> <i class="subject-icon far fa-folder"></i>
                    <h6 class="subject-name"><?php echo $row3['nameMH'] ?></h6>
                </a>
            </div>
    <?php
        }
    }
    ?>
</div>
<?php
?>
<?php include('./footer.php') ?>