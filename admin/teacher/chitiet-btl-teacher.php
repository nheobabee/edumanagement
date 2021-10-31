<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTL'], $_GET['idMH'])) {
    $idBTL = $_GET['idBTL'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
}
?>

<h1>CHI TIẾT BÀI TẬP LỚN</h1><br>
<div class="tittle-mh">
    <h2><?php echo $nameMH ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btl WHERE idMH = '$idMH' AND idBTL = '$idBTL'";
$res3 = mysqli_query($conn, $sql3);
while ($row3 = mysqli_fetch_assoc($res3)) { ?>
    <div class="title-btvn">

        <div class="name-btvn row">

            <div class="content-btvn col">
                <h6>Đề bài: <?php echo $row3['nameBTL'] ?></h6>
                <div class="file-bt">
                    <h6><?php echo $row3['filenamebtl'] ?></h6>
                    <a href="download-exercise.php?file=<?php echo $row3['filenamebtl'] ?>"> <button class="btn btn-success text-white me-2"><i class="fas fa-download"></i>Tải đề</button></a><br>
                </div>
                <div class="sub-bt">
                    <p><span style="font-weight: 500;">Ngày giao: </span><?php echo $row3['openedBTL'] ?></p>
                    <p style="border-bottom: 1px solid;"><span style="font-weight: 500;">Hạn cuối: </span><?php echo $row3['deadlineBTL'] ?></p>
                    <p class="note"><?php echo $row3['notebtl'] ?></p>
                </div>
                <a href="view-btlsv.php?idBTL=<?php echo $row3['idBTL']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="nopbai btn btn-success text-white me-2"><i class="fas fa-upload"></i> Xem bài nộp</button></a>
            </div>
        </div>
    <?php
}

    ?>


    </div>
    <?php include('./footer.php') ?>