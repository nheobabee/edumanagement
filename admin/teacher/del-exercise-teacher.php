<?php session_start() ?>
<?php include('../../config/config.php'); 
        session_start();
        if(!isset($_SESSION['teacher']))
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
        header('location: http://localhost/edumanagement/admin/teacher/exercise-subject-teacher.php?idMH=' . $idMH);
        $_SESSION['successDel'] = "<div class='success'>Xóa thành công!</div>";
    } else {
        header('location: http://localhost/edumanagement/admin/teacher/exercise-subject-teacher.php?idMH=' . $idMH);
        $_SESSION['errorDel'] = "<div class='error'>Bài tập đang được giao, không thể xóa</div>";
    }
}
?>