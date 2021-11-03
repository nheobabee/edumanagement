<?php session_start() ?>
<?php include('../config/config.php'); 
        session_start();
        if(!isset($_SESSION['loginok']))
        {
            header('location:../../login/index.php');
        }
?>
<?php
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $sql = "DELETE FROM users WHERE user_id = '$user_id'";
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