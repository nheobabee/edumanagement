<?php session_start() ?>
<?php include('../../config/config.php');
session_start();
if (!isset($_SESSION['loginok'])) {
    header('location:../login/index.php');
}
?>
<?php
if (isset($_GET['user_id'], $_GET['idMH'])) {
    $idMH = $_GET['idMH'];
    $user_id = $_GET['user_id'];
    $sql = "DELETE FROM relationship WHERE user_id = '$user_id' AND  idMH = '$idMH'";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        header('location: teach.php');
        $_SESSION['successDel'] = "<div class='success'>Xóa thành công!</div>";
    } else {
        header('location:teach.php');
        $_SESSION['errorDel'] = "<div class='error'>Giáo viên hiện đang có trong danh sách dạy, không thể xóa!</div>";
    }
}
?>