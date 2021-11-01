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
<a href="./subject.php"><button style="padding:1% 2%;" type="button" class="btn btn-secondary text-white me-2"><i class="fas fa-undo-alt"></i></button></a>
<br><br>
<div class="all">
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $sql0 = "select * from monhoc where idMH = '$idMH'";
    $res0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($res0);
}
?>
<h1><?php echo $row0['nameMH'] ?></h1>
<br>
<div class="folder-subject">
    <div class="subject-folder text-center">
        <a href="exercise-subject-teacher.php?idMH=<?php echo $idMH ?>"> <i class="subject-icon far fa-folder"></i>
            <h6 class="subject-name">BÀI TẬP VỀ NHÀ</h6>
        </a>
    </div>
    <div class="subject-folder text-center">
        <a href="btl.php?idMH=<?php echo $idMH ?>"><i class="subject-btl fas fa-users"></i>
            <h6 class="subject-name">BÀI TẬP LỚN</h6>
        </a>
    </div>
</div>
</div>
<?php include('./footer.php') ?>