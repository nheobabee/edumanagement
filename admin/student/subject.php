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
<br>
<br>
<div class="all">
    <h1>DANH SÁCH MÔN ĐANG HỌC</h1>

    <div class="btn-addsbj"><br><br>
    </div>
    <div class="f-sbj">
        <?php
        $user_id = $_SESSION["user_id"];
        $sql0 = "SELECT * from relationship where user_id = '$user_id'";
        $res0 = mysqli_query($conn, $sql0);
       
        if ($res0 == true) {
            while ($row0 = mysqli_fetch_assoc($res0)) {
                $idMH = $row0['idMH'];
                $sql3 = "SELECT * FROM monhoc where idMH = $idMH";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
                $nameMH = $row3['nameMH'];
        ?>
               
               <div class="subject-folder text-center">
                    <a href="view-subject.php?idMH=<?php echo $row0['idMH'] ?>"><i style="margin-top:5px;" class="subject-icon fas fa-book"></i>
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