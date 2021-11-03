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
<div class="f-learnteach1">
    <h1>ĐIỂM</h1>
<br>
    <div class="subject-folder1 text-center">
        <a href="./details-result-exercise-student.php?idMH=<?php echo $idMH ?>"><i class="subject-btl fas fa-chalkboard-teacher"></i>
            <h6 class="subject-name">Điểm bài tập về nhà</h6>
        </a>
    </div>
    <div class="subject-folder1 text-center">
        <a href="./details-result-btl-student.php?idMH=<?php echo $idMH ?>"><i class="subject-btl fas fa-user-graduate"></i>
            <h6 class="subject-name">Điểm bài tập lớn</h6>
        </a>
    </div>
</div>
<?php include('./footer.php') ?>