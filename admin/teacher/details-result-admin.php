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
<br><br>
<div class="f-learnteach">
    <h1>ĐIỂM - <span style="font-weight:500; font: size 25px;px"><?php echo $nameMH ?></span></h1>
<br>
    <div class="subject-folder text-center">
        <a href="./details-result-exercise-admin.php?idMH=<?php echo $idMH ?>"><i class="subject-btl fas fa-poll"></i>
            <h6 class="subject-name">Điểm bài tập về nhà</h6>
        </a>
    </div>
    <div class="subject-folder text-center">
        <a href="./details-result-btl-admin.php?idMH=<?php echo $idMH ?>"><i class="subject-btl fas fa-poll"></i>
            <h6 class="subject-name">Điểm bài tập lớn</h6>
        </a>
    </div>
</div>
<?php include('./footer.php') ?>