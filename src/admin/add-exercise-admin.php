<!-- <link rel="stylesheet" href="../../css/add-exercise-admin.css"> -->
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
<div class="tittleAdd">
    <h2>ADD EXERCISE</h2>
</div>
<form method="post">
    <?php
    if (isset($_POST['add'])) {
        $idMH = $_POST['idMH'];
        $nameBTVN = $_POST['nameBTVN'];
        $formatBTVN = $_POST['formatBTVN'];
        $deadlineBTVN = $_POST['deadlineBTVN'];
        $note = $_POST['note'];

        $sql2 = "INSERT INTO btvn(nameBTVN, formatBTVN, deadlineBTVN, note, idMH) 
                                    VALUES('$nameBTVN', '$formatBTVN', '$deadlineBTVN', '$note', '$idMH')";
        $res2 = mysqli_query($conn, $sql2);
        if ($res2 == true) {
            header('location: http://localhost/edumanagement/src/admin/exercise-subject-admin.php?idMH=' . $idMH);
        } else {
            echo $sql2;
        }
    }
    ?>
    <span style="font-weight:500">Subject: <?php echo $nameMH ?><span>
            <div class="form-group">
                <label class="subMH" for="idMH">ID Subject </label>
                <input type="text" class="form-control" id="idMH" readonly value="<?php echo $idMH ?>" name="idMH">
            </div>
            <div class="form-group">
                <label for="nameBTVN">Name Homework:</label>
                <input type="text" class="form-control" id="nameBTVN" placeholder="Enter name" name="nameBTVN">
            </div>
            <div class="form-group">
                <label for="formatBTVN">Format:</label>
                <div class="format_btvn">
                    <select id="formatBTVN" name="formatBTVN">
                        <option value="Trắc nghiệm">Trắc nghiệm</option>
                        <option value="Tự luận">Tự luận</option>
                    </select>
                </div>
            </div>
            <!-- <div class="form-group">
                                <label for="openedBTVN">Opened:</label>
                                <input type="date" class="form-control" id="openedBTVN" placeholder="Enter opened" name="openedBTVN">
                            </div> -->
            <div class="form-group">
                <label for="deadlineBTVN">Deadline:</label>
                <input type="datetime-local" class="form-control" id="deadlineBTVN" placeholder="Enter deadline" name="deadlineBTVN">
            </div>
            <div class="form-group">
                <label for="note">Note:</label>
                <input type="text" class="form-control" id="note" placeholder="Enter note" name="note">
            </div>
            <br>
            <button name="add" type="submit" class="btn btn-success">ADD</button>
</form>
<?php include('./footer.php') ?>