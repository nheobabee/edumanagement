<!-- <link rel="stylesheet" href="../../css/add-teacher-admin.css"> -->
<?php include('./header.php') ?>
<br><br>
<div style="border-top: 5px solid lightblue;" class="add-monhoc">
<h2>ADD SUBJECT</h2>
<form method="post">
    <?php
    if (isset($_POST['add'])) {
        $nameMH = $_POST['nameMH'];
        $TC = $_POST['TC'];

        $sql = "INSERT INTO monhoc(nameMH, TC) 
                                    VALUES(N'$nameMH','$TC')";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            header('location: subject.php');
        } else {
            echo $sql;
        }
    }
    ?>

    <div class="form-group">
        <label for="nameMH">Name:</label>
        <input type="text" class="form-control" id="nameMH" placeholder="Enter name" name="nameMH">
    </div>

    <div class="form-group">
        <label for="TC">Credits:</label>
        <input type="number" value="1" class="form-control" id="TC" placeholder="Enter credits" name="TC">
    </div>
    <button name="add" type="submit" class="btn btn-success">ADD</button>
</form>
</div>
<?php include('./footer.php') ?>