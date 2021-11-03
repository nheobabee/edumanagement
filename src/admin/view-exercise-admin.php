<!-- <link rel="stylesheet" href="../../css/view-exercise-admin.css"> -->
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
<br>
<a href="./add-exercise-admin.php?idMH=<?php echo $idMH; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-plus"></i>ADD EXCERCISE</button></a>
<br><br><br>
<div class="tittle-mh">
    <h2><?php echo $nameMH ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btvn WHERE idMH = '$idMH'";
$res3 = mysqli_query($conn, $sql3);

$row3 = mysqli_fetch_assoc($res3)

?>
<div class="title-btvn">

    <div class="name-btvn row">

        <div class="content-btvn col">
            <h6><?php echo $row3['nameBTVN'] ?></h6>
            <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTVN'] ?></p>
            <p style="border-bottom: 1px solid;"><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTVN'] ?></p>
            <p class="note"><?php echo $row3['note'] ?></p>
            <div class="form-tn">
                <a href="./question.php"><button type="button" class="btn btn-info text-white me-2"><i class="fas fa-upload"></i> Trắc nghiệm</button></a>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <a href=""><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-upload"></i> SEND</button></a>
        </div>
    </div>
</div>
<?php include('./footer.php') ?>