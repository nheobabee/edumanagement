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

            <div class="content-btvn">
                <h6><?php echo $row3['user_id'] ?>. <?php echo $row0['user_name'] ?>
            <?php
                $sqlmark = "SELECT * FROM ketquabtvn where user_id = '$user_id'";
                $resmark = mysqli_query($conn, $sqlmark);
                $countmark = mysqli_num_rows($resmark);
                if($countmark > 0){
                    echo '<p class="error">(Đã chấm bài)</p>';
                }
            ?>
            </h6>
                <p><span style="font-weight:500">Ngày nộp: </span><?php echo $row3['ngaynop'] ?></p>
                <div class="btn-downl">
                    <a href="download-btvnsv.php?file=<?php echo $row3['fileBTVN'] ?>"> <button class="btn btn-success text-white me-2"><i class="fas fa-download"></i>Tải và xem bài làm</button></a><br>
                </div>
                <?php
                if (isset($_POST['submit'])){
                    $user_id = $_POST['user_id'];
                    $idBTVN = $_POST['idBTVN'];
                    $markBTVN = $_POST['markBTVN'];
                    $cmtBTVN = $_POST['cmtBTVN'];
                    $sql5 = "INSERT INTO ketquabtvn values ('$user_id','$idBTVN','$markBTVN','$cmtBTVN')";
                    $res5 = mysqli_query($conn, $sql5);
                    if($res5==true){
                        header("Location:http://localhost/edumanagement/admin/teacher/view-btvnsv.php?idBTVN=" .$idBTVN."&&idMH=". $idMH );
                    }
                    else{
                        echo 'Sinh viên này đã được chấm điểm';
                    }
                }
                ?>
                <form action="" method="post">
                <input type="text" hidden class="markBTVN form-control" id="user_id" name="user_id" value="<?php echo $user_id ?>">
                <input type="text" hidden class="markBTVN form-control" id="idBTVN" name="idBTVN" value="<?php echo $idBTVN ?>">
                    <div class="mark-btvn">
                        <label class="markBTVN" for="idMH">Điểm: </label>
                        <input type="text" class="markBTVN form-control" id="markBTVN" name="markBTVN">
                    </div>
                    <div class="cmt-btvn">
                        <label for="cmtBTVN">Nhận xét:</label>
                        <textarea class="cmtBTVN form-control" id="cmtBTVN" rows="3" name="cmtBTVN"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success text-white me-2" name="submit"><i class="fas fa-upload"></i> Gửi</button></a>
                </form>

            </div>
        </div>

    </div>
<?php
}

?>

<?php include('./footer.php') ?>