<!-- <link rel="stylesheet" href="../../css/add-teacher-admin.css"> -->
<?php include('./header.php') ?>
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM monhoc WHERE idMH = '$idMH'";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
    $TC = $row1['TC'];
}
?>
<h2>UPDATE SUBJECT</h2>
<form method="post">
    <?php
    if (isset($_POST['add'])) {
        $nameMH = $_POST['nameMH'];
        $TC = $_POST['TC'];

        $sql2 = "UPDATE monhoc

            SET nameMH = N'$nameMH',
            TC = '$TC'                        
              WHERE idMH = '$idMH'";
        $res2 = mysqli_query($conn, $sql2);
        if ($res2 == true) {
            header('location: subject.php');
        } else {
            echo $sql2;
        }
    }
    ?>
    <div class="form-group">
        <label for="nameMH">ID Subject:</label>
        <input type="text" class="form-control" id="idMH" readonly placeholder="Enter name" name="idMH" value="<?php echo $idMH ?>">
    </div>

    <div class="form-group">
        <label for="nameMH">Name:</label>
        <input type="text" class="form-control" id="nameMH" placeholder="Enter name" name="nameMH" value="<?php echo $nameMH ?>">
    </div>

    <div class="form-group">
        <label for="TC">Credits:</label>
        <input type="number" class="form-control" id="TC" placeholder="Enter credits" name="TC" value="<?php echo $TC ?>">
    </div>

    <br>
    <button name="add" type="submit" class="btn btn-success">UPDATE</button>
</form>
<?php include('./footer.php') ?>