<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTL'], $_GET['idMH'])) {
    $idBTL = $_GET['idBTL'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
    $sql2 = "SELECT * FROM btl WHERE  idBTL = $idBTL";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $nameBTL = $row2['nameBTL'];
}


// $sql4 = "SELECT * FROM btvn WHERE  user_id = $row3";
// $res4 = mysqli_query($conn, $sql4);
// $row4 = mysqli_fetch_assoc($res4);
// $user_name = $row4['user_name'];

?>
<br>
<br><br>
<div class="tittle-mh">
    <h3><?php echo $nameMH ?></h3>
    <h5><?php echo $nameBTL ?></h5>
</div>
<?php
$sql3 = "SELECT * FROM btlsv WHERE idMH = '$idMH' AND idBTL = '$idBTL'";
$res3 = mysqli_query($conn, $sql3);

while ($row3 = mysqli_fetch_assoc($res3)) { ?>
    <div class="title-btvn">

        <div class="name-btvn row">

            <div class="content-btvn col">
                <h6><?php echo $row3['user_id'] ?></h6>
                <label for="empEmail" class="col-sm-3 col-form-label">Đề bài:</label>
                <div class="form-group">
                    <h6><?php echo $row3['fileBTL'] ?></h6>
                    <a href="download-btvnsv.php?file=<?php echo $row3['fileBTL'] ?>"> <button class="btn btn-success text-white me-2"><i class="fas fa-download"></i>Tải và xem bài làm</button></a><br>
                </div>

            </div>
        </div>

    </div>
<?php
}

?>


</div>
<?php include('./footer.php') ?>