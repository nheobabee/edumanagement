<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTVN'], $_GET['idMH'])) {
    $idBTVN = $_GET['idBTVN'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
}
?>
<h1>CHI TIẾT BÀI TẬP</h1><br>
<div class="tittle-mh">
    <h2><?php echo $nameMH ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btvn WHERE idMH = '$idMH' AND idBTVN = '$idBTVN'";
$res3 = mysqli_query($conn, $sql3);
while ($row3 = mysqli_fetch_assoc($res3)) { ?>
    <div class="title-btvn">

        <div class="name-btvn row">

            <div class="content-btvn col">
                <h6>Đề bài: <?php echo $row3['nameBTVN'] ?></h6>
                <div class="file-bt">
                    <h6><?php echo $row3['filename'] ?></h6>
                    <a href="download-exercise.php?file=<?php echo $row3['filename'] ?>"> <button class="btn btn-success text-white me-2"><i class="fas fa-download"></i>Tải đề</button></a><br>
                </div>
                <div class="sub-bt">
                    <p><span style="font-weight: 500;">Ngày giao: </span><?php echo $row3['openedBTVN'] ?></p>
                    <p style="border-bottom: 1px solid;"><span style="font-weight: 500;">Hạn cuối: </span><?php echo $row3['deadlineBTVN'] ?></p>
                    <p class="note"><?php echo $row3['note'] ?></p>
                </div>

                <a href="view-btvnsv.php?idBTVN=<?php echo $row3['idBTVN']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-upload"></i>Xem bài tập đã nộp</button></a>

            </div>
        </div>
    <?php
}

    ?>


    </div>
    <?php include('./footer.php') ?>