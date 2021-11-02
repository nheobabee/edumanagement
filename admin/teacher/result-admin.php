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
<div class="all"><h1>DANH SÁCH ĐIỂM</h1>

    <div class="btn-addsbj"><br><br>    
</div>
   <div class="f-sbj">
   <?php
// lấy giá trị user cần sửa 
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
?>
   <?php
    $sql4 = "SELECT * FROM relationship where user_id = '$user_id'";
    $res4 = mysqli_query($conn, $sql4);
    
    
    if ($res4 == true) {
        while ($row4 = mysqli_fetch_assoc($res4)) {
            $idMH1 = $row4['idMH'];
            $sql3 = "SELECT * FROM monhoc where idMH = '$idMH1'";
            $res3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($res3);
    ?>
            <div class="subject-folder text-center">
           
                 
                <a href="details-result-admin.php?idMH=<?php echo $row3['idMH'] ?>"> <i class="subject-icon far fa-folder"></i>
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