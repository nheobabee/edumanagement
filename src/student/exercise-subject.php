<?php include('./header.php')  ?>
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
<div class="tittle-mh">
    <h1 class="title-btl">BÀI TẬP VỀ NHÀ</h1>
<br>
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

                <div class="content-btvn col-md-10">
                    <h6><?php echo $row3['nameBTVN'] ?></h6>
                    <p><span style="font-weight: 500;">Hình thức: </span><?php echo $row3['formatBTVN'] ?></p>
                    <p><span style="font-weight: 500;">Ngày giao: </span><?php echo $row3['openedBTVN'] ?></p>
                    <p><span style="font-weight: 500;">Hạn cuối: </span><?php echo $row3['deadlineBTVN'] ?></p>
                    <p><span style="font-weight: 500;">Ghi chú: </span><?php echo $row3['note'] ?></p>

                </div>
                <div class="service col-md-2">
                    <a href="./view-exercise.php?idBTVN=<?php echo $row3['idBTVN']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="btn btn-info text-white me-2"><i class="far fa-eye"></i> VIEW</button></a>
                </div>

            </div>
        </div>
<?php
    }
}
?>
<?php include('./footer.php') ?>