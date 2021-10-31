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
<a href="./add-exercise-teacher.php?idMH=<?php echo $idMH; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-plus"></i> Thêm bài tập</button></a>
<br><br>
<div class="tittle-mh">
    <h2><?php echo $nameMH ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btvn WHERE idMH = '$idMH'";
$res3 = mysqli_query($conn, $sql3);
if ($res3 == true) {
    while ($row3 = mysqli_fetch_assoc($res3)) {

?>
        <div class="title-btvn">

            <div class="name-btvn row">

                <div class="content-btvn col-md-7">
                    <h6><?php echo $row3['nameBTVN'] ?></h6>
                    <p><span style="font-weight: 500;">Hình thức: </span><?php echo $row3['formatBTVN'] ?></p>
                    <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTVN'] ?></p>
                    <p style="border-bottom: 1px solid;"><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTVN'] ?></p>
                    <p class="note"><?php echo $row3['note'] ?></p>

                </div>
                <div class="service col-md-5">
                    <a href="./upd-exercise-teacher.php?idBTVN=<?php echo $row3['idBTVN']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-edit"></i> Cập nhật</button></a>
                    <a href="./del-exercise-teacher.php?idBTVN=<?php echo $row3['idBTVN']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="btn btn-danger text-white me-2"><i class="fas fa-trash-alt"></i> Xóa</button></a>
                    <a href="./view-exercise-teacher.php?idBTVN=<?php echo $row3['idBTVN']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="btn btn-info text-white me-2"><i class="far fa-eye"></i> Xem</button></a>
                </div>
            </div>
        </div>
<?php
    }
}
?>
<?php include('./footer.php') ?>