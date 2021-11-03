<?php include('./header.php') ?>
<br>
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $sql0 = "select * from monhoc where idMH = '$idMH'";
    $res0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($res0);
}
?>
<br>
<div class="all1 text-center">
<h1><?php echo $row0['nameMH'] ?></h1>
<br>
<div class="folder-subject">
    <div class="subject-folder1 text-center">
        <a href="exercise-subject.php?idMH=<?php echo $idMH ?>"> <i class="subject-icon far fa-folder"></i>
            <h6 class="subject-name">BÀI TẬP VỀ NHÀ</h6>
        </a>
    </div>
    <div class="subject-folder1 text-center">
        <a href="btl.php?idMH=<?php echo $idMH ?>"><i class="subject-btl fas fa-users"></i>
            <h6 class="subject-name">BÀI TẬP LỚN</h6>
        </a>
    </div>
</div>
</div>
<?php include('./footer.php')  ?>