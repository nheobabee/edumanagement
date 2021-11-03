<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTL'])) {
    $idBTL = $_GET['idBTL'];

    $sql1 = "SELECT * FROM btl WHERE idBTL = $idBTL ";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameBTL = $row1['nameBTL'];
    $idMH = $row1['idMH'];
}

?><br>
<a href="http://localhost/edumanagement/src/admin/btl.php?idMH=<?php echo $idMH ?>"><button style="padding:1% 2%;" type="button" class="btn btn-secondary text-white me-2"><i class="fas fa-undo-alt"></i></button></a>
<br><br>

<div class="all_btvn">
    <div class="tittle-mh">
        <h1><?php echo $nameBTL ?></h1>
    </div>
    <?php
    $sql2 = "SELECT * FROM dkbtl WHERE idBTL = $idBTL";
    $res2 = mysqli_query($conn, $sql2);

    if ($res2 == true) {
        while ($row2 = mysqli_fetch_assoc($res2)) {
            $user_id = $row2['user_id'];
            $sql3 = "select * from users where user_id = $user_id";
            $res3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($res3);

    ?>
            <div class="title-btvn">
                <div class="name-btvn row">
                    <div class="content-btvn col-md-10">
                        <h6><?php echo $row2['user_id'] ?>. <?php echo $row3['user_name'] ?></h6>

                    </div>


                </div>
            </div>
    <?php
        }
    }
    ?>

</div>


<?php include('./footer.php'); ?>