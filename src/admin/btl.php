<!-- <link rel="stylesheet" href="../../css/btl-ad.css"> -->
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
<a href="http://localhost/edumanagement/src/admin/view-subject-admin.php?idMH=<?php echo $idMH ?>"><button style="padding:1% 2%;" type="button" class="btn btn-secondary text-white me-2"><i class="fas fa-undo-alt"></i></button></a>
<br><br>


<div class="all_btvn">
<div class="tittle-mh">
    <h2><?php echo $row1['nameMH'] ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btl WHERE idMH = '$idMH'";
$res3 = mysqli_query($conn, $sql3);
if ($res3 == true) {
    while ($row3 = mysqli_fetch_assoc($res3)) {

?>
        <div class="title-btvn">
            <div class="name-btvn row">
                <div class="content-btvn col-md-7">
                    <h4><?php echo $row3['nameBTL'] ?></h4>
                    <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTL'] ?></p>
                    <p><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTL'] ?></p>
                    <p class="note">Ghi chú: <?php echo $row3['notebtl'] ?></p>
                </div>
                <div class="service col-md-5">
                    <a href="./dsnhom-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="btn btn-info text-white me-2"><i class="far fa-eye"></i> VIEW</button></a>
                </div>
            </div>
        </div>
<?php
    }
}
?>
</div>

<?php include('./footer.php') ?>