<!-- <link rel="stylesheet" href="../../css/sj-stu.css"> -->
<?php include('./header.php') ?>
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];

    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
}
?>
<br>
<br>
<div class="f-learnteach">
    <h1>GIẢNG DẠY - HỌC TẬP</h1>
    <br>
    <div class="subject-folder text-center">
        <a href="./teach.php"><i class="subject-btl fas fa-chalkboard-teacher"></i>
            <h6 class="subject-name">Giảng dạy</h6>
        </a>
    </div>
    <div class="subject-folder text-center">
        <a href="./learn.php"><i class="subject-btl fas fa-user-graduate"></i>
            <h6 class="subject-name">Học tập</h6>
        </a>
    </div>
</div>
<?php include('./footer.php') ?>