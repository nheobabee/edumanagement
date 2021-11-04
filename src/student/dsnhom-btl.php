<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTL'])) {
    $idBTL = $_GET['idBTL'];

    $sql1 = "SELECT * FROM btl WHERE idBTL = $idBTL ";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameBTL = $row1['nameBTL'];
    $deadlineBTL = $row1['deadlineBTL'];
}

?>
<br><br>

<div class="tittle-mh">
    <h1><?php echo $nameBTL ?></h1>
</div>
<?php
$sql_late = "select * from btlsv where idBTL= '$idBTL' ";
$rs_late = mysqli_query($conn, $sql_late);
$row_late = mysqli_fetch_assoc($rs_late);
if($row_late>0){
$late = $row_late['ngaynop']; //ngay nop bai
}
?>
<?php
$sql2 = "SELECT * FROM dkbtl WHERE idBTL = $idBTL";
$res2 = mysqli_query($conn, $sql2);

if ($res2 == true) {
    while ($row2 = mysqli_fetch_assoc($res2)) {
        $user_id = $row2['user_id'];
        $sql0 = "SELECT * FROM users where user_id = '$user_id'";
        $res0 = mysqli_query($conn, $sql0);
        $row0 = mysqli_fetch_assoc($res0);

?>

        <div class="title-btvn">
            <div class="name-btvn row">
                <div class="content-btvn col-md-10">
                    <h6><?php echo $row2['user_id'] ?>. <?php echo $row0['user_name'] ?></h6>
                    <h6>
                        <?php
                        $sqllate = "SELECT * FROM btlsv WHERE user_id = '$user_id'";
                        $reslate = mysqli_query($conn, $sqllate);
                        $rowlate = mysqli_fetch_assoc($reslate);
                        if ($rowlate > 0) {
                            $ngaynop = $rowlate['ngaynop'];
                            $date1 = strtotime($deadlineBTL);
                            $date2 =  strtotime($ngaynop);
                            $day_late = $date2 - $date1;
                            if ($day_late > 0) {
                                echo "(Nộp muộn)";
                            } else {
                                echo "(Đã nộp)";
                            }
                        } ?>
                    </h6>
                </>


            </div>
        </div>
<?php
    }
}
?>



<?php include('./footer.php'); ?>