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
<h1 class="title-btl">BÀI TẬP VỀ NHÀ</h1>
<br>
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

                <div class="content-btvn col-md-10">
                    <h6><?php echo $row3['nameBTVN'] ?></h6>
                    <p><span style="font-weight: 500;">Hình thức: </span><?php echo $row3['formatBTVN'] ?></p>
                    <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTVN'] ?></p>
                    <p><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTVN'] ?></p>


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