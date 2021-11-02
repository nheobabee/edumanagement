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
    <h1><?php echo $nameBTL ?></h1>
</div>
<?php
$sql2 = "SELECT * FROM dkbtl WHERE idBTL = $idBTL";
$res2 = mysqli_query($conn, $sql2);

if ($res2 == true) {
    while ($row2 = mysqli_fetch_assoc($res2)) {
        $user_id = $row2['user_id'];
        $sqluser = "SELECT * from users where user_id = '$user_id'";
        $resuser = mysqli_query($conn, $sqluser);
        $rowuser = mysqli_fetch_assoc($resuser);

?>
        <div class="title-btvn">
            <div class="name-btvn row">
                <div class="content-btvn col-md-10">
                    <h6><?php echo $user_id ?>.<?php echo $rowuser['user_name'] ?>
                        <?php
                        $sqlmark = "SELECT * FROM ketquabtl where user_id = '$user_id'";
                        $resmark = mysqli_query($conn, $sqlmark);
                        $countmark = mysqli_num_rows($resmark);
                        if ($countmark > 0) {
                            echo '<p class="error">(Đã chấm bài)</p>';
                        }
                        ?>
                    </h6>
                    <?php
                    if (isset($_POST['submit'])) {
                        $user_id1 = $_POST['user_id1'];
                        $markBTL = $_POST['markBTL'];
                        $cmtBTL = $_POST['cmtBTL'];
                        $sql5 = "INSERT INTO ketquabtl values ('$user_id1','$idBTL','$markBTL','$cmtBTL')";
                        $res5 = mysqli_query($conn, $sql5);
                        if ($res5 == true) {
                            header("Location:http://localhost/edumanagement/admin/teacher/dsnhom-btl-teacher.php?idBTL=" . $idBTL);
                        } else {
                            echo $sql5;
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <input type="text" class="markBTVN form-control" id="user_id" name="user_id1" value="<?php echo $user_id ?>">

                        <div class="mark-btvn">
                            <label class="markBTVN" for="idMH">Điểm: </label>
                            <input type="text" class="markBTVN form-control" id="markBTL" name="markBTL">
                        </div>
                        <div class="cmt-btvn">
                            <label for="cmtBTL">Nhận xét:</label>
                            <textarea class="cmtBTVN form-control" id="cmtBTL" rows="3" name="cmtBTL"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success text-white me-2" name="submit"><i class="fas fa-upload"></i> Gửi</button></a>
                    </form>
                </div>


            </div>
        </div>
<?php
    }
}
?>
<?php include('./footer.php'); ?>