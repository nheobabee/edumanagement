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
<br>
<div class="all"><h1>DANH SÁCH BÀI TẬP LỚN</h1>

    <div class="btn-addsbj"><br><br>    
</div>
   <div class="f-sbj">
   <?php
        $user_id = $_SESSION["user_id"];
        $sql0 = "SELECT * from btlsv where user_id = '$user_id'";
        $res0 = mysqli_query($conn, $sql0);

        if ($res0 == true) {
            while ($row0 = mysqli_fetch_assoc($res0)) {
                $idMH = $row0['idMH'];
                $idBTL = $row0['idBTL'];
                $sql3 = "SELECT * FROM btl where idMH = $idMH AND idBTL = $idBTL";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
                $nameMH = $row3['nameBTL'];
        ?>
            <div class="subject-folder text-center"> 
                 
             <a href="display-mark-btl.php?idMH=<?php echo $idMH?>&&idBTL=<?php echo $row3['idBTL']?>"> <i class="subject-icon far fa-folder"></i>
                    <h6 class="subject-name"><?php echo $row3['nameBTL'] ?></h6>
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