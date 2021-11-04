<!-- <link rel="stylesheet" href="../../css/ex-stu-ad.css"> -->
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
<a href="http://localhost/edumanagement/src/admin/view-subject-admin.php?idMH=<?php echo $idMH ?>"><button style="padding:1% 2%;margin-left: 55px;" type="button" class="btn btn-secondary text-white me-2"><i class="fas fa-undo-alt"></i></button></a>
<br><br>
<div class="all_btvn">
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

                    <div class="content-btvn col-md-7">
                        <h6><?php echo $row3['nameBTVN'] ?></h6>
                        <p><span style="font-weight: 500;">Hình thức: </span><?php echo $row3['formatBTVN'] ?></p>
                        <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTVN'] ?></p>
                        <p><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTVN'] ?></p>
                        <p>Ghi chú: <?php echo $row3['note'] ?></p>

                    </div>

                </div>
            </div>
    <?php
        }
    }
    ?>
    <?php include('./footer.php') ?>