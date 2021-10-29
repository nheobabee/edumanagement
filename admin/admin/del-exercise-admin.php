<?php session_start() ?>
<?php include('../../config/config.php'); 
        session_start();
        if(!isset($_SESSION['loginok']))
        {
            header('location:../../login/index.php');
        }
?>
<?php
if (isset($_GET['idBTVN'], $_GET['idMH'])) {
    $idBTVN = $_GET['idBTVN'];
    $idMH = $_GET['idMH'];
    $sql = "DELETE FROM btvn WHERE idBTVN = '$idBTVN'";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        header('location: http://localhost/edumanagement/admin/exercise-subject-admin.php?idMH=' . $idMH);
        $_SESSION['successDel'] = "<div class='success'>Xóa thành công!</div>";
    } else {
        header('location:student.php');
        $_SESSION['errorDel'] = "<div class='error'>Sinh hiện đang có trong danh sách học, không thể xóa!</div>";
    }
}
?>