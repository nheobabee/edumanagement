<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTVN'], $_GET['idMH'])) {
    $idBTVN = $_GET['idBTVN'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
}
?>
<br>
<br><br>

<form action="" method="post" enctype="multipart/form-data">
<div class="tittle-mh">
    <h2><?php echo $nameMH ?></h2>
</div>
<?php

$sql3 = "SELECT * FROM btvn WHERE idMH = '$idMH' AND idBTVN = '$idBTVN'";
$res3 = mysqli_query($conn, $sql3);
while ($row3 = mysqli_fetch_assoc($res3)) { ?>
    <?php
    if (isset($_POST['send'])) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "filebt/" . $fileName;
        $notebtvnsv = $_POST['notebtvnsv'];
        $userid = $_SESSION['user_id'];
        $query = "INSERT INTO `btvnsv`(`idBTVN`, `user_id`, `fileBTVN`, `notebtvnsv`, `idMH`) 
                            VALUES (' $idBTVN','$userid','$fileName','$notebtvnsv','$idMH')";
        $run = mysqli_query($conn, $query);

        if ($run) {
            move_uploaded_file($fileTmpName, $path);
           header("Location:http://localhost/edumanagement/admin/student/exercise-subject.php?idMH=".$idMH);
        } else {
            echo $query;
        }
    }
    ?>
    <div class="title-btvn">


        <div style="min-height: 400px;" class="name-btvn row">

            <div class="content-btvn col">
                <h6><?php echo $row3['nameBTVN'] ?></h6>
                <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTVN'] ?></p>
                <p style="border-bottom: 1px solid;"><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTVN'] ?></p>
                <p class="note"><?php echo $row3['note'] ?></p>
                <div class="form-tn">

                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="notebtvnsv"></textarea>
                </div>
                <label for="empEmail" class="col-sm-3 col-form-label">File bài nộp</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <button style="margin-top:10px;" type="submit" class="btn btn-success text-white me-2" name="send"><i class="fas fa-upload"></i>SEND</button></a>
            </div>
        </div>
    </div>
<?php
}
?>
</form>
<?php include('./footer.php') ?>