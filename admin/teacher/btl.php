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
<a href="./add-btl-teacher.php?idMH=<?php echo $idMH; ?>"><button class="btn btn-success"><i class="fas fa-plus"></i> Thêm bài tập lớn</button></a>
<br><br>

<div class="tittle-mh">
    <h2><?php echo $nameMH ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btl WHERE idMH = '$idMH'";
$res3 = mysqli_query($conn, $sql3);
if ($res3 == true) {
    while ($row3 = mysqli_fetch_assoc($res3)) {

?>
        <div class="title-btvn">

            <div class="name-btvn">

                <div class="content-btvn">
                    <h4><?php echo $row3['nameBTL'] ?></h4>
                    <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTL'] ?></p>
                    <p style="border-bottom: 1px solid;"><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTL'] ?></p>
                    <p class="note">Ghi chú: <?php echo $row3['notebtl'] ?></p>

                </div>
                <div style="margin-top:10px" >
                    <a href="./upd-btl-teacher.php?idBTL=<?php echo $row3['idBTL']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-edit"></i> Cập nhật</button></a>
                    <a href="./del-btl-teacher.php?idBTL=<?php echo $row3['idBTL']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="btn btn-danger text-white me-2"><i class="fas fa-trash-alt"></i> Xóa</button></a>
                    <a href="./chitiet-btl-teacher.php?idBTL=<?php echo $row3['idBTL']; ?>&&idMH=<?php echo $row3['idMH']; ?>"><button type="button" class="btn btn-info text-white me-2"><i class="far fa-eye"></i> Xem</button></a>
                </div>
            </div>
        </div>
<?php
    }
}
?>
<?php include('./footer.php'); ?>