<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTL'])) {
    $idBTL = $_GET['idBTL'];

    $sql1 = "SELECT * FROM btl WHERE idBTL = $idBTL ";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameBTL = $row1['nameBTL'];
}
?>
<br>

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
    <p class="note"><?php echo $row1['nameBTL'] ?></p>
<?php
}
?>

<?php include('./footer.php'); ?>