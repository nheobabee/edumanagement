<!-- <link rel="stylesheet" href="../css/upd-teacher-admin.css"> -->
<?php include('./header.php') ?>
<?php
if (isset($_GET['idGV'])) {
    $idGV = $_GET['idGV'];
    $sql1 = "SELECT * FROM giaovien WHERE idGV = '$idGV'";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameGV = $row1['nameGV'];
    $genderGV = $row1['genderGV'];
    $emailGV = $row1['emailGV'];
    $sdtGV = $row1['sdtGV'];
    $addressGV = $row1['addressGV'];
}
?>
<h2>UPDATE TEACHER</h2>
<form method="post">
    <?php
    if (isset($_POST['add'])) {
        $nameGV = $_POST['nameGV'];
        $genderGV = $_POST['genderGV'];
        $emailGV = $_POST['emailGV'];
        $sdtGV = $_POST['sdtGV'];
        $addressGV = $_POST['addressGV'];

        $sql2 = "UPDATE giaovien SET
        nameGV = '$nameGV',
        genderGV = '$genderGV',
        emailGV = '$emailGV',
        sdtGV = '$sdtGV',
        addressGV = '$addressGV'
        WHERE idGV = '$idGV'";
        $res2 = mysqli_query($conn, $sql2);
        if ($res2 == true) {
            header('location: teacher.php');
        } else {
            echo $sql;
        }
    }
    ?>
    <div class="form-group">
        <label for="nameGV">Name:</label>
        <input type="text" class="form-control" id="nameGV" placeholder="Enter name" name="nameGV" value="<?php echo $nameGV ?>">
    </div>
    <div class="form-group">
        <label for="genderGV">Gender:</label>
        <div class="rdo-genderGV" style="padding-left: 12px;">
            <input <?php if ($genderGV == "1") {
                        echo "checked";
                    } ?> id="genderGV" type="radio" name="genderGV" value="1"> Nam
            <input <?php if ($genderGV == "0") {
                        echo "checked";
                    } ?> id="genderGV" type="radio" name="genderGV" value="0"> Nữ
        </div>
    </div>
    <div class="form-group">
        <label for="emailGV">Email:</label>
        <input type="email" class="form-control" id="emailGV" placeholder="Enter email" name="emailGV" value="<?php echo $emailGV ?>">
    </div>
    <div class="form-group">
        <label for="sdtGV">Phone number:</label>
        <input type="tel" class="form-control" id="sdtGV" placeholder="Enter phone number" name="sdtGV" value="<?php echo $sdtGV ?>">
    </div>
    <div class="form-group">
        <label for="addressGV">Address:</label>
        <input type="text" class="form-control" id="addressGV" placeholder="Enter address" name="addressGV" value="<?php echo $addressGV ?>">
    </div>
    <br>
    <button name="add" type="submit" class="btn btn-success">UPDATE</button>
</form>
<?php include('./footer.php') ?>