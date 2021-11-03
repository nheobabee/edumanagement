<?php include('./header.php') ?>
<?php
// lấy giá trị name cần sửa 
if (isset($_GET['idBTL'], $_GET['idMH'])) {
    $idBTL = $_GET['idBTL'];
    $idMH = $_GET['idMH'];
    $sql0 = "SELECT * FROM monhoc WHERE idMH = '$idMH'";
    $res0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($res0);

    //lấy giá trị từ bảng
    $sqlqq = "SELECT * FROM btl WHERE idBTL = '$idBTL'";
    $kqqq = mysqli_query($conn, $sqlqq);
    if ($kqqq) {
        $rowqq = mysqli_fetch_assoc($kqqq);
        $nameBTL_q = $rowqq['nameBTL'];
        $formatBTL_q = $rowqq['formatBTL'];
        $openedBTL_q = $rowqq['openedBTL'];
        $deadlineBTL_q = $rowqq['deadlineBTL'];
        $idMH_q = $rowqq['idMH'];
        $note_q = $rowqq['notebtl'];
    }
}

?>
<br><br>
<div class="add-ex">

<h2>CẬP NHẬT BÀI TẬP LỚN</h2>
<br>
<form method="post" enctype="multipart/form-data">


    <?php
    if (isset($_POST['updbtl'])) {

        $nameBTL_q = $_POST['nameBTL'];
        $formatBTL_q = $_POST['formatBTL'];
        $deadlineBTL_q = $_POST['deadlineBTL'];
        $idMH_q = $_POST['idMH'];
        $note_q = $_POST['notebtl'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "uploads/" . $fileName;
        $sql3 = "UPDATE `btl` SET 
                                `nameBTL`=' $nameBTL_q',
                                `formatBTL`='$formatBTL_q',                               
                                `deadlineBTL`='$deadlineBTL_q',
                                `notebtl`=' $note_q',
                                `filenamebtl`='$fileName'                              
                                WHERE idBTL = $idBTL";
        $res3 = mysqli_query($conn, $sql3);
        if ($res3 == true) {
            move_uploaded_file($fileTmpName, $path);
            header("Location:http://localhost/edumanagement/src/teacher/btl.php?idMH=" . $idMH);
        } else {
            echo 'lỗi';
        }
    }
    ?>
    <span style="font-weight:500">Môn học: <?php echo $row0['nameMH'] ?><span>
            <div class="form-group">
                <label class="idBTL" for="idMH">Mã bài tập lớn: </label>
                <input type="text" class="form-control" id="idBTL" readonly value="<?php echo $idBTL ?>" name="idBTL">
            </div>
            <div class="form-group">
                <label for="nameBTL">Tên bài tập lớn:</label>
                <input type="text" class="form-control" id="nameBTL" placeholder="Enter name" name="nameBTL" value="<?php echo  $nameBTL_q ?>">
            </div>

            <div class="form-group">
                <label for="formatBTL">Hình thức:</label>
                <div class="format_btvn">
                    <select id="formatBTL" name="formatBTL">
                        <?php
                        ?>
                        <option <?php if ($formatBTL_q == 'Trắc nghiệm') {
                                    echo 'selected';
                                } ?> value="Trắc nghiệm">Trắc nghiệm</option>
                        <option <?php if ($formatBTL_q == 'Tự luận') {
                                    echo 'selected';
                                } ?> value="Tự luận">Tự luận</option>
                        <?php
                        ?>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="deadlineBTL">Hạn cuối:</label>
                <input type="datetime-local" class="form-control" id="deadlineBTL" placeholder="Enter deadlineBTL" name="deadlineBTL" value="<?php echo $date = date("Y-m-d\TH:i:s", strtotime($deadlineBTL_q)); ?>">
            </div>
            <label for="empEmail" class="col-sm-3 col-form-label">Tệp</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" id="file" name="file" value="<?php echo $fileName_q ?>">
            </div>

            <div class="form-group">
                <label for="tenGV">Ghi chú:</label>
                <input type="text" class="form-control" id="notebtl" placeholder="Enter tenGV" name="notebtl" value="<?php echo $note_q ?>">
            </div>

            <br>
            <button name="updbtl" type="submit" class="btn btn-success"><i class="fas fa-pen"></i> Cập nhật</button>
</form>
</div>
<?php include('./footer.php') ?>