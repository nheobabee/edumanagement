<?php include('./header.php') ?>
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM monhoc where idmh = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($res1);
    $nameMH = $row['nameMH'];
}
?>
<br><br>
<div class="add-ex">
    
<div class="tittleAdd">
    <h2>THÊM BÀI TẬP</h2>
</div>
<form method="post" enctype="multipart/form-data">


    <?php
    if (isset($_POST['add'])) {
        $idMH = $_POST['idMH'];
        $namebtvn = $_POST['nameBTVN'];
        $formatbtvn = $_POST['formatBTVN'];
        $deadlineBTVN = $_POST['deadlineBTVN'];
        $note = $_POST['note'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "uploads/" . $fileName;

        $query = "INSERT INTO `btvn`(`nameBTVN`, `formatBTVN`,`deadlineBTVN`, `note`, `filename`, `idMH`) 
                                VALUES (' $namebtvn','$formatbtvn','$deadlineBTVN','$note','$fileName','$idMH')";
        $run = mysqli_query($conn, $query);

        if ($run) {
            move_uploaded_file($fileTmpName, $path);
            header('location: http://localhost/edumanagement/src/teacher/exercise-subject-teacher.php?idMH=' . $idMH);
        } else {
            echo $query;
        }
    }

    ?>
    <span style="font-weight:500">Môn học: <?php echo $nameMH ?><span>
            <div class="form-group">
                <label class="subMH" for="idMH">Mã môn học:</label>
                <input type="text" class="form-control" id="idMH" readonly value="<?php echo $idMH ?>" name="idMH">
            </div>
            <div class="form-group">
                <label for="nameBTVN">Tên bài tập:</label>
                <input type="text" class="form-control" id="nameBTVN" placeholder="Enter name" name="nameBTVN">
            </div>
            <div class="form-group">
                <label for="formatBTVN">Hình thức:</label>
                <div class="format_btvn">
                    <select id="formatBTVN" name="formatBTVN">
                        <option value="Trắc nghiệm">Trắc nghiệm</option>
                        <option value="Tự luận">Tự luận</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="deadlineBTVN">Hạn cuối:</label>
                <input type="datetime-local" class="form-control" id="deadlineBTVN" placeholder="Enter deadline" name="deadlineBTVN">
            </div>
            <label for="empEmail" class="col-sm-3 col-form-label">Tệp:</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <div class="form-group">
                <label for="note">Ghi chú:</label>
                <input type="text" class="form-control" id="note" placeholder="Enter note" name="note">
            </div>
            <br>
            <button name="add" type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</button>
</form>
</div>
<?php include('./footer.php') ?>