<?php session_start() ?>
<?php include('../config/config.php');
session_start();
if (!isset($_SESSION['loginok'])) {
    header('location:../../login/index.php');
}
?>
<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $sql = "DELETE FROM monhoc WHERE idMH = '$idMH'";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        header('location: subject.php');
        $_SESSION['successDel'] = "<div class='success'>Xóa thành công!</div>";
    } else {
        header('location:subject.php');
        $_SESSION['errorDel'] = "<div class='error'>Môn học đang trong danh sách giảng dạy, không thể xóa!</div>";
    }
}
?>