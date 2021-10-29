<?php session_start() ?>
<?php include('../../config/config.php'); 
        session_start();
        if(!isset($_SESSION['student']))
        {
            header('location:../../login/index.php');
        }
?>
<?php
    if(isset($_GET['idSV'])){
        $idSV = $_GET['idSV'];
        $sql = "DELETE FROM sinhvien WHERE idSV = '$idSV'";
        $res = mysqli_query($conn, $sql);
        if($res == true){
            header('location: student.php');
            $_SESSION['successDel'] = "<div class='success'>Xóa thành công!</div>";
        }
        else{
            header('location:student.php');
            $_SESSION['errorDel'] = "<div class='error'>Sinh hiện đang có trong danh sách học, không thể xóa!</div>";
        }
    }
?>