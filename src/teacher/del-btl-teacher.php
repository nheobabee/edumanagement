<?php session_start() ?>
<?php include('../config/config.php'); 
        session_start();
        if(!isset($_SESSION['teacher']))
        {
            header('location:../../login/index.php');
        }
?>
<?php
    if(isset($_GET['idBTL'],$_GET['idMH'])){
        $idBTL = $_GET['idBTL'];
        $idMH = $_GET['idMH'];
        $sql = "DELETE FROM btl WHERE idBTL = '$idBTL'";
        $res = mysqli_query($conn, $sql);

       
        if($res == true){
            header('location: http://localhost/edumanagement/src/teacher/btl.php?idMH=' . $idMH);
            $_SESSION['successDel'] = "<div class='success'>Xóa thành công!</div>";
        }
        else{
            header('location: http://localhost/edumanagement/src/teacher/btl.php?idMH=' . $idMH);
            $_SESSION['errorDel'] = "<div class='error'>Bài tập lớn đang được giao, không thể xóa!</div>";
        }
    }
?>