<?php include('./header.php') ?>
<h2>ADD TEACHER</h2>
<form method="post">
    <?php
    if (isset($_POST['add'])) {
        $nameGV = $_POST['nameGV'];
        $genderGV = $_POST['genderGV'];
        $emailGV = $_POST['emailGV'];
        $sdtGV = $_POST['sdtGV'];
        $addressGV = $_POST['addressGV'];

        $sql = "INSERT INTO giaovien(nameGV, genderGV, emailGV, sdtGV, addressGV) 
                                    VALUES('$nameGV','$genderGV','$emailGV','$sdtGV','$addressGV')";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            header('location: teacher.php');
        } else {
            echo $sql;
        }
    }
    ?>
    <div class="form-group">
        <label for="nameGV">Name:</label>
        <input type="text" class="form-control" id="nameGV" placeholder="Enter name" name="nameGV">
    </div>
    <div class="form-group">
        <label for="genderGV">Gender:</label>
        <div class="rdo-genderGV" style="padding-left: 12px;">
            <input id="genderGV" type="radio" name="genderGV" value="1"> Nam
            <input id="genderGV" type="radio" name="genderGV" value="0"> Nữ
        </div>
    </div>
    <div class="form-group">
        <label for="emailGV">Email:</label>
        <input type="email" class="form-control" id="emailGV" placeholder="Enter email" name="emailGV">
    </div>
    <div class="form-group">
        <label for="sdtGV">Phone number:</label>
        <input type="tel" class="form-control" id="sdtGV" placeholder="Enter phone number" name="sdtGV">
    </div>
    <div class="form-group">
        <label for="addressGV">Address:</label>
        <input type="text" class="form-control" id="addressGV" placeholder="Enter address" name="addressGV">
    </div>
    <br>
    <button name="add" type="submit" class="btn btn-success">ADD</button>
</form>
<?php include('./footer.php') ?>