<!-- <link rel="stylesheet" href="../../css/sj-stu.css"> -->
<?php include('./header.php') ?>
<?php
if (isset($_SESSION['errorDel'])) {
    echo $_SESSION['errorDel'];
    unset($_SESSION['errorDel']);
}
if (isset($_SESSION['successDel'])) {
    echo $_SESSION['successDel'];
    unset($_SESSION['successDel']);
}
?>

<?php
?>
<br><br>
<div class="all">
    <h1>DANH SÁCH MÔN</h1>

    <div class="btn-addsbj"><br><br>
    </div>
    <div class="f-sbj">
        <?php
        $sql3 = "SELECT * FROM monhoc ";
        $res3 = mysqli_query($conn, $sql3);
        if ($res3 == true) {
            while ($row3 = mysqli_fetch_assoc($res3)) {
        ?>
                <div class="subject-folder text-center">


                    <a href="details-result-admin.php?idMH=<?php echo $row3['idMH'] ?>"><i class="subject-icon fas fa-book"></i>
                        <h6 class="subject-name"><?php echo $row3['nameMH'] ?></h6>
                    </a>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<?php
?>
<?php include('./footer.php') ?>