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
<div class="btn-chucnang">
    <a href="./dk-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-success text-white"><i class="fas fa-edit"></i> Đăng kí</button></a>
    <a href="./dsnhom-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-info text-white "><i class="far fa-eye"></i>Danh sách nhóm</button></a>

</div>
<br>
<div class="tittle-mh">
    <h2><?php echo $nameMH; ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btl WHERE idMH = '$idMH' AND idBTL = '$idBTL'";
$res3 = mysqli_query($conn, $sql3);
while ($row3 = mysqli_fetch_assoc($res3)) { ?>
    <div class="title-btvn">
        <div class="name-btvn row">

            <div class="content-btvn col">

                <h6><?php echo $row3['nameBTL'] ?></h6>
                <label for="empEmail" class="col-sm-3 col-form-label">Đề bài:</label>
                <div class="form-group">
                    <h6><?php echo $row3['filenamebtl'] ?></h6>
                    <a href="download-exercise.php?file=<?php echo $row3['filenamebtl'] ?>"> <button class="btn btn-success text-white me-2"><i class="fas fa-download"></i>Tải đề</button></a>
                    <a href="./dk-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-success text-white me-4 col-3"><i class="fas fa-edit"></i> Đăng kí</button></a>
                    <a href="./dsnhom-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-info text-white me-4 col-3"><i class="far fa-eye"></i>Danh sách nhóm</button></a>
                    <a href="send-btl.php?idBTL=<?php echo $row3['idBTL']; ?>&&idMH=<?php echo $row3['idMH']; ?>&&user_id=<?php echo $_SESSION['user_id']; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-upload"></i>NỘP BÀI</i></button></a>
                </div>

            </div>
        </div>

    </div>
    </div>

    </div>
<?php
}

?>
<?php include('./footer.php') ?>