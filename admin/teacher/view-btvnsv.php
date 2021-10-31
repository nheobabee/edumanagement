<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTVN'], $_GET['idMH'])) {
    $idBTVN = $_GET['idBTVN'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
    $sql2 = "SELECT * FROM btvn WHERE  idBTVN = $idBTVN";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $nameBTVN = $row2['nameBTVN'];
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
    <h5><?php echo $nameBTVN ?></h5>
</div>
<?php
$sql3 = "SELECT * FROM btvnsv WHERE idMH = '$idMH' AND idBTVN = '$idBTVN'";
$res3 = mysqli_query($conn, $sql3);

while ($row3 = mysqli_fetch_assoc($res3)) {
    $user_id = $row3['user_id'];
    $sql0 = "Select * from users where user_id = '$user_id'";
    $res0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($res0);
?>
    <div class="title-btvn">

        <div class="name-btvn row">

            <div class="content-btvn col">
                <h6><?php echo $row3['user_id'] ?>. <?php echo $row0['user_name'] ?></h6>
                <p><span style="font-weight:500">Ngày nộp: </span><?php echo $row3['ngaynop'] ?></p>
                <div class="form-group">
                    <a href="download-btvnsv.php?file=<?php echo $row3['fileBTVN'] ?>"> <button class="btn btn-success text-white me-2"><i class="fas fa-download"></i>Tải và xem bài làm</button></a><br>
                </div>

            </div>
        </div>

    </div>
<?php
}

?>


<?php include('./footer.php') ?>