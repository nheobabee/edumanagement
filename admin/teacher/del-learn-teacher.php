<?php session_start() ?>
<?php include('../../config/config.php'); 
        session_start();
        if(!isset($_SESSION['teacher']))
        {
            header('location:../login/index.php');
        }
?>
<?php
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $sql = "DELETE FROM relationship WHERE user_id = '$user_id'";
        $res = mysqli_query($conn, $sql);
        if($res == true){
            header("Location: http://localhost/edumanagement/admin/teacher/learn-teacher.php");
            $_SESSION['successDel'] = "<div class='success'>Xóa thành công!</div>";
        }
        else{
            header('location:learn.php');
            $_SESSION['errorDel'] = "<div class='error'>Lỗi!</div>";
        }
    }
?>