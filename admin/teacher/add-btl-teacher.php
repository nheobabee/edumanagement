<?php include('./header.php') ?>
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $sql5 = "SELECT * FROM monhoc WHERE idMH = '$idMH'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $nameMH = $row5['nameMH'];
}

?>
<br><br>
<div class="add-ex">
    
<h2>THÊM BÀI TẬP LỚN</h2>
<span style="font-weight:500">Môn học: <?php echo $nameMH ?><span>
        <form method="post" enctype="multipart/form-data">

            <?php
            if (isset($_POST['addbtl'])) {

                $nameBTL = $_POST['nameBTL'];
                $formatBTL = $_POST['formatBTL'];
                // $openedBTL = $_POST['openedBTL'];
                $deadlineBTL = $_POST['deadlineBTL'];
                $idMH = $_POST['idMH'];
                $note = $_POST['notebtl'];
                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $path = "uploads/" . $fileName;

                $sql = "INSERT INTO `btl`( `nameBTL`, `formatBTL`, `deadlineBTL`, `notebtl`, `filenamebtl`, `idMH`)
                                VALUES (' $nameBTL','$formatBTL','$deadlineBTL','$note','$fileName', '$idMH')";
                $res = mysqli_query($conn, $sql);
                if ($res == true) {
                    move_uploaded_file($fileTmpName, $path);
                    header('location: http://localhost/edumanagement/admin/teacher/btl.php?idMH=' . $idMH);
                } else {
                    echo $sql;
                }
            }
            ?>
            <div class="form-group">
                <label class="subMH" for="idMH">Mã môn học:</label>
                <input type="text" class="form-control" id="idMH" readonly value="<?php echo $idMH ?>" name="idMH">
            </div>
            <div class="form-group">
                <label for="nameBTL">Tên bài tập lớn:</label>
                <input type="text" class="form-control" id="nameBTL" placeholder="Enter name" name="nameBTL">
            </div>

            <div class="form-group">
                <label for="formatBTVN">Hình thức:</label>
                <div class="format_btvn">
                    <select id="formatBTL" name="formatBTL">
                        <option value="Trắc nghiệm">Trắc nghiệm</option>
                        <option value="Tự luận">Tự luận</option>
                    </select>
                </div>
            </div>
            <!-- <div class="form-group">
                                    <label for="openedBTL">openedBTL:</label>
                                    <input type="date" class="form-control" id="openedBTL" placeholder="Enter openedBTL" name="openedBTL">
                                </div> -->
            <div class="form-group">
                <label for="deadlineBTL">Hạn cuối:</label>
                <input type="datetime-local" class="form-control" id="deadlineBTL" placeholder="Enter deadlineBTL" name="deadlineBTL">
            </div>

            <label for="empEmail" class="col-sm-3 col-form-label">Đề bài</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <div class="form-group">
                <label for="addressSV">Ghi chú:</label>
                <input type="text" class="form-control" id="notebtl" placeholder="note" name="notebtl">
            </div>

            <br>
            <button name="addbtl" type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</button>
        </form>
</div>
        <?php include('./footer.php') ?>