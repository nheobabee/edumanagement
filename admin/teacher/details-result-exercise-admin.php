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
 if(isset($_GET['idMH'])){
     $idMH = $_GET['idMH'];
     
 }
?>
<br><br>
<div class="all"><h1>DANH SÁCH BÀI TẬP VỀ NHÀ</h1>

    <div class="btn-addsbj"><br><br>    
</div>
   <div class="f-sbj">
   <?php
    $sql3 = "SELECT * FROM btvn where idMH = '$idMH'";
    $res3 = mysqli_query($conn, $sql3);
    if ($res3 == true) {
        while ($row3 = mysqli_fetch_assoc($res3)) {
    ?>
            <div class="subject-folder text-center"> 
                 
             <a href="display-mark-exercise.php?idMH=<?php echo $idMH?>&&idBTVN=<?php echo $row3['idBTVN']?>"><i class="subject-icon fas fa-file"></i>
                    <h6 class="subject-name"><?php echo $row3['nameBTVN'] ?></h6>
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