<?php
include('../config/config.php'); 
session_start();
if(!isset($_SESSION['check-passforgot']))
{
    header('location:forgot-ppas.php');
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './sendEmail/Exception.php';
require './sendEmail/PHPMailer.php';
require './sendEmail/SMTP.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/forget-password.css">
    <title>Forget password Template | Bootcatch themes</title>
</head>

<body>
    
    <div class="d-flex align-items-center light-blue-gradient" style="height: 100vh;">
        <div class="container">
            <form action="" method="POST">
                <div class="d-flex justify-content-center">
                    <div class="col-md-7">
                        <div class="card rounded-0 shadow">
                            <div class="card-body">
                                <h3>Forget Password</h3>
                                <form>
                                    <?php
                                    if(isset($_SESSION['password-expired']))
                                    {
                                        echo $_SESSION['password-expired'];
                                        unset($_SESSION['password-expired']);
                                    }
                                        ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Code address:</label>
                                        <input name="code" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter code">
                                        <small id="emailHelp" class="form-text text-muted">please check your enail.</small>
                                    </div>
                                    <button name="forgot-pass" type="submit" class="btn btn-primary">Send Code</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </form>
<?php
if(isset($_POST['forgot-pass']))
{
    $email = $_GET['email'];
    $code = $_POST['code'];
    if(isset($_COOKIE['code']))
    {
    $sql = "select * from db_users where user_email = '$email' and code_forgot ='$code'";
    $rs = mysqli_query($conn,$sql);
    if($rs)
    {
        header("location:change-password.php?email=$email");
    }
    }else 
    {
        $sql_code = "update db_users set code_forgot = '' where user_email='$email'";
        $rs_code = mysqli_query($conn,$sql_code);
        $_SESSION['password-expired']="<h3 style='color:red'>password expired please send code again </h3>";
    }
}
?>


        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </div>
</body>
<style>
    @import url(https://fonts.googleapis.com/css?family=Poppins);

    body {
        font-family: "Poppins", sans-serif;
    }

    .light-blue-gradient {
        background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
    }
</style>

</html>