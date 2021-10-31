<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTL'])) {
    $idBTL = $_GET['idBTL'];

    $sql1 = "SELECT * FROM btl WHERE idBTL = $idBTL ";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameBTL = $row1['nameBTL'];
}
?>

<br>

<div class="tittle-mh">

</div>
<?php
$sql3 = "SELECT * FROM btlsv WHERE idBTL = $idBTL";
$res3 = mysqli_query($conn, $sql3);
if ($res3 == true) {
    while ($row3 = mysqli_fetch_assoc($res3)) {

?>

        <div class="title-btvn">

            <div class="name-btvn row">

                <div class="content-btvn col-md-7">
                    <h2 style="color:darkgrey"><?php echo $row3['nameTeam'] ?></h2>
                    <p><span style="font-weight: 500;">Thành viên 1: </span><?php echo $row3['nameST1'] ?></p>
                    <p><span style="font-weight: 500;">Thành viên 2: </span><?php echo $row3['nameST2'] ?></p>
                    <p><span style="font-weight: 500;">Thành viên 3: </span><?php echo $row3['nameST3'] ?></p>
                    <p style="border-bottom: 1px solid;"><span style="font-weight: 500;"></span></p>
                    <p class="note"><?php echo $row1['nameBTL'] ?></p>

                </div>
                <div class="service col-md-5">
                    <a href="./dk-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-edit"></i> Đăng kí</button></a>

                    <a href="./upd-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-edit"></i> UPDATE</button></a>
                    <a href="./del-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-danger text-white me-2"><i class="fas fa-trash-alt"></i> DELETE</button></a>
                    <a href="./view-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-info text-white me-2"><i class="far fa-eye"></i> VIEW</button></a>
                </div>
            </div>
        </div>
<?php
    }
}
?>
<?php include('./footer.php') ?>