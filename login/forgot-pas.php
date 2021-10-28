<?php
include('../config/config.php');
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
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address:</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">we'll send forget password link on your email.</small>
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
                setcookie('code',mt_rand(1000,99999),time()+300);
                $code = $_COOKIE['code'];
                $email = $_POST['email'];
                $sql = "update db_users set code_forgot = '$code' where user_email= '$email'";
                $rs = mysqli_query($conn,$sql);
                $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                        $mail->isSMTP(); // gửi mail SMTP
                        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                        $mail->SMTPAuth = true; // Enable SMTP authentication
                        $mail->Username = 'vuong9xx@gmail.com'; // SMTP username// 'aqdz01@gmail.com'
                        $mail->Password = 'wjcntbqtopmkkzyh'; // SMTP password'durvyjkufbrdelbl'
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                        $mail->Port = 587; // TCP port to connect to
                        $mail->CharSet = 'UTF-8';
                        //Recipients
                        $mail->setFrom('vuong9xx@gmail.com', 'Đăng ký tài khoản ');

                        $mail->addReplyTo('vuong9xx@gmail.com', 'Đăng ký tài khoản ');

                        $mail->addAddress($email); // Add a recipient
                        // Content
                        $mail->isHTML(true);   // Set email format to HTML
                        $tieude = '[Đăng ký tài khoản]';
                        $mail->Subject = $tieude;

                        //  Mail body content 
                        $bodyContent = '<h2><p>Xin chào<p></h2>';
                        $bodyContent .= "<p>Vui lòng không tiết lộ mã này : '. $code .' </p>";
                        $bodyContent .= '<p>Vui lòng không trả lời thư này .</p>';
                        $bodyContent .= '<p><b>Trân trọng cảm ơn !</b></p>';
                        $bodyContent .= '<p><b>Chào !Thân ái!</b></p>';

                        $mail->Body = $bodyContent;
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        if ($mail->send()) {
                            echo 'Thư đã được gửi đi';
                        } else {
                            echo 'Lỗi. Thư chưa gửi được';
                        }
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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