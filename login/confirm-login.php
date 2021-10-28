<?php
include('../config/config.php');
$email = $_GET['email'];
$code = md5($_GET['code']);
$sql  = "select * from db_users where user_email = '$email'";
$rs  = mysqli_query($conn,$sql);

if(mysqli_num_rows($rs)>0)
{
    $row = mysqli_fetch_assoc($rs);
    if($code = $row['code'])
    {
        echo "<h1 style='color:green'>Bạn đã kích hoạt thành công</h1>";
        $sql_u = "update db_users set status = 1";
        $rs_u = mysqli_query($conn,$sql_u);
    }else 
    {
        echo "<h1 style='color:red'>Bạn đã kích hoạt thất bại</h1>";
    }
}

?>