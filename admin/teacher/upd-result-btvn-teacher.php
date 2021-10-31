<?php include('./header.php') ?>
<?php
if (isset($_GET['idSV'], $_GET['idBTVN'])) {
    $idSV = $_GET['idSV'];
    $idBTVN = $_GET['idBTVN'];

    $sql0 = "SELECT * FROM sinhvien where idSV='$idSV'";
    $res0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($res0);


    $sql1 = "SELECT * FROM ketquabtvn WHERE idSV = '$idSV' and idBTVN = $idBTVN";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $markBTVN = $row1['markBTVN'];
    $cmtBTVN = $row1['cmtBTVN'];
}
?>
<h2>UPDATE STUDENT</h2>
<form method="post">
    <?php
    if (isset($_POST['add'])) {
        $idSV = $_POST['idSV'];
        $idBTVN = $_POST['idBTVN'];
        $markBTVN = $_POST['markBTVN'];
        $cmtBTVN = $_POST['cmtBTVN'];

        $sql2 = "UPDATE ketquabtvn SET
                                    markBTVN = '$markBTVN',
                                    cmtBTVN = '$cmtBTVN'
                                    WHERE idSV = '$idSV' and idBTVN = '$idBTVN'";
        $res2 = mysqli_query($conn, $sql2);
        if ($res2 == true) {
            header('location: result-btvn-admin.php');
        } else {
            echo $sql;
        }
    }
    ?>

    <div class="form-group">
        <p>Name Student: <span style="font-weight: 500"><?php echo  $row0['nameSV']; ?></span></p>
        <label for="idSV">ID Student:</label>
        <input type="text" class="form-control" id="idSV" readonly name="idSV" value="<?php echo $idSV ?>">
    </div>

    <div class="form-group">
        <label for="idBTVN">ID BTVN:</label>
        <input type="text" class="form-control" id="idBTVN" readonly name="idBTVN" value="<?php echo $idBTVN ?>">
    </div>
    <div class="form-group">
        <label for="markBTVN">Mark:</label>
        <input type="text" class="form-control" id="markBTVN" placeholder="Enter phone number" name="markBTVN" value="<?php echo $markBTVN ?>">
    </div>
    <div class="form-group">
        <label for="cmtBTVN">Comment:</label>
        <input type="text" class="form-control" id="cmtBTVN" placeholder="Enter address" name="cmtBTVN" value="<?php echo $cmtBTVN ?>">
    </div>
    <br>
    <button name="add" type="submit" class="btn btn-success">UPDATE</button>
</form>
<?php include('./footer.php') ?>