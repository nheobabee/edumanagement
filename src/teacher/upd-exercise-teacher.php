<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTVN'], $_GET['idMH'])) {
    $idBTVN = $_GET['idBTVN'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM btvn where idBTVN = $idBTVN and idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $idBTVN = $row1['idBTVN'];
    $nameBTVN = $row1['nameBTVN'];
    $formatBTVN1 = $row1['formatBTVN'];
    $deadlineBTVN = $row1['deadlineBTVN'];
    $fileName_q = $row1['filename'];
    $note_q = $row1['note'];


    $sql2 = "SELECT * FROM monhoc where idMH = $idMH";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $nameMH = $row2['nameMH'];
}
?>
<br><br>
<div class="add-ex">
    
<div class="tittleAdd">
    <h2>CẬP NHẬT BÀI TẬP</h2>
    <br>
</div>
<form method="post" enctype="multipart/form-data">
    <?php
    if (isset($_POST['add'])) {

        $nameBTVN = $_POST['nameBTVN'];
        $formatBTVN = $_POST['formatBTVN'];
        $deadlineBTVN = $_POST['deadlineBTVN'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "uploads/" . $fileName;
        $note = $_POST['note'];

        $sql3 = "UPDATE `btvn` SET `nameBTVN`='$nameBTVN',
                                `formatBTVN`=' $formatBTVN',
                                `deadlineBTVN`=' $deadlineBTVN',
                                `note`='$note',
                                `filename`='$fileName'                              
                                WHERE idBTVN = '$idBTVN'";
        $res3 = mysqli_query($conn, $sql3);
        if ($res3 == true) {
            move_uploaded_file($fileTmpName, $path);
            header("Location:http://localhost/edumanagement/src/teacher/exercise-subject-teacher.php?idMH=" . $idMH);
        } else {
            echo $sql3;
        }
    }
    ?>
    <span style="font-weight:500">Môn học: <?php echo $nameMH ?><span>
            <div class="form-group">
                <label class="idBTVN" for="idMH">Mã bài tập: </label>
                <input type="text" class="form-control" id="idBTVN" readonly value="<?php echo $idBTVN ?>" name="idBTVN">
            </div>
            <div class="form-group">
                <label for="nameBTVN">Tên bài tập:</label>
                <input type="text" class="form-control" id="nameBTVN" placeholder="Enter name" name="nameBTVN" value="<?php echo $nameBTVN ?>">
            </div>
            <div class="form-group">
                <label for="formatBTVN">Hình thức:</label>
                <div class="format_btvn">
                    <select id="formatBTVN" name="formatBTVN">
                        <?php
                        ?>
                        <option <?php if ($formatBTVN1 == 'Trắc nghiệm') {
                                    echo 'selected';
                                } ?> value="Trắc nghiệm">Trắc nghiệm</option>
                        <option <?php if ($formatBTVN1 == 'Tự luận') {
                                    echo 'selected';
                                } ?> value="Tự luận">Tự luận</option>
                        <?php
                        ?>

                    </select>
                </div>
            </div>
            <!-- <div class="form-group">
                                <label for="openedBTVN">Opened:</label>
                                <input type="date" class="form-control" id="openedBTVN" placeholder="Enter opened" name="openedBTVN">
                            </div> -->



            <div class="form-group">
                <label for="deadlineBTVN">Hạn cuối:</label>
                <div class="deadline-BTVN">
                    <input type="datetime-local" name="deadlineBTVN" id="deadlineBTVN" value="<?php echo $date = date("Y-m-d\TH:i:s", strtotime($deadlineBTVN)); ?>">
                </div>
                <label for="empEmail" class="col-sm-3 col-form-label">Tệp</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="file" name="file" value="<?php echo $fileName_q ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="note">Ghi chú:</label>
                <input type="text" class="form-control" id="note" placeholder="Enter note" name="note" value="<?php echo $note_q ?>">
            </div>

            <button style="margin-top:10px" name="add" type="submit" class="btn btn-success"><i class="fas fa-pen"></i> Cập nhật</button>
</form>
</div>
<?php include('./footer.php') ?>