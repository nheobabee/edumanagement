<!-- <link rel="stylesheet" href="../../css/list-dk-btl.css"> -->
<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTL'], $_GET['idMH'])) {
    $idBTL = $_GET['idBTL'];
    $idMH = $_GET['idMH'];
    $sql1 = "SELECT * FROM btl WHERE idBTL = $idBTL ";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameBTL = $row1['nameBTL'];
}
?>
<br>
<a href="http://localhost/edumanagement/admin/admin/btl.php?idMH=<?php echo $idMH ?>"><button style="padding:1% 2%;" type="button" class="btn btn-secondary text-white me-2"><i class="fas fa-undo-alt"></i></button></a>
<br><br>
<div class="tittle-mh">
    <h1><?php echo $nameBTL ?></h1>
</div>
<?php
$sql3 = "SELECT * FROM btlsv WHERE idBTL = $idBTL";
$sql4 = "SELECT * FROM btlsv WHERE idBTL = $idBTL";
$res4 = mysqli_query($conn, $sql4);
$res3 = mysqli_query($conn, $sql3);
$row4 = mysqli_fetch_assoc($res4)
?>
<?php

if ($res3 == true) {

?>
    <div class="team-btl">
        <h2 style="color:darkgrey"><?php echo $row4['note'] ?></h2>
        <?php
        $i = 1;
        while ($row3 = mysqli_fetch_assoc($res3)) {
            $user_id = $row3['user_id'];
            $sql6 = "SELECT * FROM users WHERE user_id = $user_id";
            $res6 = mysqli_query($conn, $sql6);
            $row6 = mysqli_fetch_assoc($res6);

        ?>

            <p><span style="font-weight: 500;">Thành viên <?php echo $i ?>: </span><?php echo $row6['user_name'] ?></p>
        <?php
            $i++;
        } ?>

    </div>

<?php
}
?>

<?php include('./footer.php') ?>