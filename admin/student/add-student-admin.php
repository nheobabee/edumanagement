<?php include('./header.php') ?>
<h2>ADD STUDENT</h2>
<form method="post">
    <?php
    if (isset($_POST['add'])) {
        $nameSV = $_POST['nameSV'];
        $genderSV = $_POST['genderSV'];
        $emailSV = $_POST['emailSV'];
        $sdtSV = $_POST['sdtSV'];
        $addressSV = $_POST['addressSV'];

        $sql = "INSERT INTO sinhvien(nameSV, genderSV, emailSV, sdtSV, addressSV) 
                                    VALUES('$nameSV','$genderSV','$emailSV','$sdtSV','$addressSV')";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            header('location: student.php');
        } else {
            echo $sql;
        }
    }
    ?>
    <div class="form-group">
        <label for="nameSV">Name:</label>
        <input type="text" class="form-control" id="nameSV" placeholder="Enter name" name="nameSV">
    </div>
    <div class="form-group">
        <label for="genderSV">Gender:</label>
        <div class="rdo-genderGV" style="padding-left: 12px;">
            <input id="genderSV" type="radio" name="genderSV" value="1"> Nam
            <input id="genderSV" type="radio" name="genderSV" value="0"> Nữ
        </div>
    </div>
    <div class="form-group">
        <label for="emailSV">Email:</label>
        <input type="email" class="form-control" id="emailSV" placeholder="Enter email" name="emailSV">
    </div>
    <div class="form-group">
        <label for="sdtSV">Phone number:</label>
        <input type="tel" class="form-control" id="sdtSV" placeholder="Enter phone number" name="sdtSV">
    </div>
    <div class="form-group">
        <label for="addressSV">Address:</label>
        <input type="text" class="form-control" id="addressSV" placeholder="Enter address" name="addressSV">
    </div>
    <br>
    <button name="add" type="submit" class="btn btn-success">ADD</button>
</form>
<?php include('./footer.php'); ?>