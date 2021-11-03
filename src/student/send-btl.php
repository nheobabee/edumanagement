<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTL'], $_GET['idMH'])) {
    $idBTL = $_GET['idBTL'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
}
?>
<?php
 $user_id = $_SESSION['user_id'];
?>
<br>
<br><br>

<form action="" method="post" enctype="multipart/form-data">
    <div class="tittle-mh">
        <h2><?php echo $nameMH ?></h2>
    </div>
    <?php

    $sql3 = "SELECT * FROM btl WHERE idMH = '$idMH' AND idBTL = '$idBTL'";
    $res3 = mysqli_query($conn, $sql3);
    while ($row3 = mysqli_fetch_assoc($res3)) { ?>

        <?php
        if (isset($_POST['send'])) {

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $path = "filebt/" . $fileName;
            $notebtlsv = $_POST['notebtlsv'];
            $userid = $_SESSION['user_id'];
            $sql4 = "SELECT * FROM `dkbtl` WHERE user_id = $user_id AND idBTL = $idBTL AND idMH = $idMH";
            $res4 = mysqli_query($conn, $sql4);
            $countchecksend = mysqli_num_rows($res4);
            if ($countchecksend > 0) {
                $query = "INSERT INTO `btlsv`(`idBTL`, `user_id`, `idMH`, `fileBTL`, `notebtlsv`) 
                            VALUES ('$idBTL','$userid','$idMH','$fileName','$notebtlsv')";
                $run = mysqli_query($conn, $query);

                if ($run) {
                    move_uploaded_file($fileTmpName, $path);
                    header("Location:http://localhost/edumanagement/src/student/btl.php?idMH=" . $idMH);
                } else {
                    echo '<p class="error">Bạn đã nộp bài rồi</p>';
                }
            } else {
                $_SESSION['errorchecksend'] = '<p class="error">Bạn không thuộc nhóm này</p>';
                header("Location:http://localhost/edumanagement/src/student/btl.php?idMH=" . $idMH);
            }
        }
        ?>
        <div class="title-btvn">


            <div style="min-height: 400px;" class="name-btvn row">

                <div class="content-btvn col">
                    <h6><?php echo $row3['nameBTL'] ?></h6>
                    <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTL'] ?></p>
                    <p style="border-bottom: 1px solid;"><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTL'] ?></p>
                    <p class="note"><?php echo $row3['notebtl'] ?></p>
                    <div class="form-tn">

                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="notebtlsv"></textarea>
                    </div>
                    <label for="empEmail" class="col-sm-3 col-form-label">File bài nộp</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <button style="margin-top:10px" type="submit" class="btn btn-success text-white me-2" name="send"><i class="fas fa-upload"></i>SEND</button></a>
                </div>
            </div>
        </div>
</form>
<?php
    }
?>
<?php include('./footer.php') ?>