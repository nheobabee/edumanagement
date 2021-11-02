<?php include('./header.php') ?>
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];

    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
}
?>
<br><br>


<?php
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['errorcheck'])) {
    echo $_SESSION['errorcheck'];
    unset($_SESSION['errorcheck']);
}
if (isset($_SESSION['csuccess'])) {
    echo $_SESSION['csuccess'];
    unset($_SESSION['csuccess']);
}
if (isset($_SESSION['cerror'])) {
    echo $_SESSION['cerror'];
    unset($_SESSION['cerror']);
}
if (isset($_SESSION['cerrorcheck'])) {
    echo $_SESSION['cerrorcheck'];
    unset($_SESSION['cerrorcheck']);
}
if (isset($_SESSION['errorchecksl'])) {
    echo $_SESSION['errorchecksl'];
    unset($_SESSION['errorchecksl']);
}
if (isset($_SESSION['errorchecksend'])) {
    echo $_SESSION['errorchecksend'];
    unset($_SESSION['errorchecksend']);
}
?>
<div class="tittle-mh">
<h1 class="title-btl">BÀI TẬP LỚN</h1>
<br>
    <h2><?php echo $nameMH ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btl WHERE idMH = '$idMH'";
$res3 = mysqli_query($conn, $sql3);
if ($res3 == true) {
    while ($row3 = mysqli_fetch_assoc($res3)) {
       $idBTL= $row3['idBTL'];

?>
        <div class="title-btvn">

            <div class="name-btvn row">

                <div class="content-btvn col-md-8">
                    <h4><?php echo $row3['nameBTL'] ?></h4>
                    <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTL'] ?></p>
                    <p><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTL'] ?></p>
                    <p class="note">Ghi chú: <?php echo $row3['notebtl'] ?></p>

                </div>
                <div class="service col-md-4">
                    <a href="./chitiet-btl.php?idBTL=<?php echo $row3['idBTL']; ?>&&idMH=<?php echo $row3['idMH']; ?>&&user_id=<?php echo $_SESSION['user_id']; ?>"><button type="button" class="btn btn-info text-white me-2"><i class="far fa-eye"></i> VIEW</button></a>
                    <?php 
                        if (isset($_SESSION['user_id'])) {
                        $userid = $_SESSION['user_id'];

                    }

                    ?>
                    <?php 
                        $sql2 = "SELECT * FROM dkbtl WHERE user_id = $userid AND idBTL = $idBTL ";
                        $res2 = mysqli_query($conn,$sql2);
                        $count = mysqli_num_rows($res2);
                        if($count>0){?>
                           <p>Đã đăng ký</p>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
<?php
    }
}
?>
<?php include('./footer.php')  ?>