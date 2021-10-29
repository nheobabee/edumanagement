<?php session_start() ?>
<?php include('../config/config.php'); 
        session_start();
        if(!isset($_SESSION['loginok']))
        {
            header('location:../login/index.php');
        }
?>
<?php
    if(isset($_GET['idBTL'])){
        $idBTL = $_GET['idBTL'];
        $sql = "DELETE FROM btl WHERE idBTL = '$idBTL'";
        $res = mysqli_query($conn, $sql);
       
        if($res == true){
            header("Location:http:subject.php");
            $_SESSION['successDel'] = "<div class='success'>Xóa thành công!</div>";
        }
        else{
            header('location:subject.php');
            $_SESSION['errorDel'] = "<div class='error'>Sinh hiện đang có trong danh sách học, không thể xóa!</div>";
        }
    }
?>