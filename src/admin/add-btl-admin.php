<!-- <link rel="stylesheet" href="../../css/add-teacher-admin.css"> -->
<?php include('./header.php'); ?>
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $sql5 = "SELECT * FROM monhoc WHERE idMH = '$idMH'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $nameMH = $row5['nameMH'];
}
?>
<h2>ADD BTL</h2>
<h6>Môn học: <?php echo $nameMH ?></h6>
<form method="post">
    <?php
    if (isset($_POST['addbtl'])) {

        $nameBTL = $_POST['nameBTL'];
        $formatBTL = $_POST['formatBTL'];

        $deadlineBTL = $_POST['deadlineBTL'];
        $idMH = $_POST['idMH'];
        $note = $_POST['notebtl'];


        $sql = "INSERT INTO `btl`( `nameBTL`, `formatBTL`,  `deadlineBTL`, `idMH`, `notebtl`) 
                                VALUES (' $nameBTL','$formatBTL','$deadlineBTL',' $idMH ','$note')";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            header("location:http://localhost/edumanagement/src/admin/btl.php?idMH= " . $idMH);
        } else {
            echo $sql;
        }
    }
    ?>
    <div class="form-group">
        <label for="nameBTL">Name BTL:</label>
        <input type="text" class="form-control" id="nameBTL" placeholder="Enter name" name="nameBTL">
    </div>

    <div class="form-group">
        <label for="formatBTL">formatBTL:</label>
        <input type="text" class="form-control" id="formatBTL" placeholder="Enter formatBTL" name="formatBTL">
    </div>
    <!-- <div class="form-group">
                                    <label for="openedBTL">openedBTL:</label>
                                    <input type="date" class="form-control" id="openedBTL" placeholder="Enter openedBTL" name="openedBTL">
                                </div> -->
    <div class="form-group">
        <label for="deadlineBTL">deadlineBTL:</label>
        <input type="datetime-local" class="form-control" id="deadlineBTL" placeholder="Enter deadlineBTL" name="deadlineBTL">
    </div>
    <div class="form-group ">
        <label for="idMH" class="col-sm-2 col-form-label">Tên môn học:</label>
        <div class="col-sm-10">
            <select name="idMH">
                <?php
                $sqlq = "SELECT * FROM monhoc WHERE idMH = $idMH   ";
                $resultq = mysqli_query($conn, $sqlq);
                if (mysqli_num_rows($resultq) > 0) {
                    while ($row = mysqli_fetch_assoc($resultq)) {
                        echo '<option value="' . $idMH . '">' . $row['nameMH'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="addressSV">Ghi chú:</label>
        <input type="text" class="form-control" id="notebtl" placeholder="note" name="notebtl">
    </div>

    <br>
    <button name="addbtl" type="submit" class="btn btn-success">ADD BTL</button>
</form>
</div>
<?php include('./footer.php') ?>