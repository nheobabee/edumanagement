<?php
include('../config/config.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './sendEmail/Exception.php';
require './sendEmail/PHPMailer.php';
require './sendEmail/SMTP.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="./signup.css">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <?php
    if (isset($_POST['sign-up'])) {
        $name = $_POST['Name'];
        $phone = $_POST['Phone'];
        $avata = $_FILES['Avatar']['name'];
        $birthday = $_POST['birthday'];
        $code = md5(rand());
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        //upload anh 
        $fileimg =  "img/";
        $fileavt = $fileimg . $avata;
        //query
        $sql_checkmail = "select * from users where user_email = '$email'";
        $rs_checkmail = mysqli_query($conn, $sql_checkmail);
        if (mysqli_num_rows($rs_checkmail) > 0) {
            $_SESSION['email-exist'] = "<h4 style='color:red'>Email exist</h4>";
        } else {
            if ($pass1 == $pass2) {
                $pass_hash = password_hash($pass1,PASSWORD_DEFAULT); 
                if (move_uploaded_file($_FILES["Avatar"]["tmp_name"], $fileavt)) {
                    $sql = "insert into users(user_name,user_avatar ,user_birthday, user_gioitinh , user_phone, user_email, user_pass, code)
                                            values('$name',' $fileavt','$birthday','$gender','$phone','$email','$pass_hash','$code')";
                    $rs = mysqli_query($conn, $sql);
                    header('location:index.php');
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
                        $bodyContent .= '<p>Nhấn vào đây để kích hoạt <a href="http://localhost/edumanagement/login/confirm-login.php?email='.$email.'&code='.$code.'">Xác nhận</a></p>';
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
            } else {
                echo "Mật khẩu nhập lại chưa đúng";
            }
        }
    }

    ?>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST" enctype="multipart/form-data">
                      <?php
                      if(isset($_SESSION['email-exist']))
                      {
                        echo $_SESSION['email-exist'];
                        unset($_SESSION['email-exist']);
                      }
                      ?>
                      <br>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Fullname</label>
                                    <input name="Name" class="input--style-4" type="text">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone number</label>
                                    <input class="input--style-4" type="text" name="Phone">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="date" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input value="1" type="radio"  name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input value="0" type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="text" name="pass1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Request password</label>
                                    <input class="input--style-4" type="text" name="pass2">
                                </div>
                            </div>

                        </div>

                        <div class="col-2">

                            <div class="form-outline">
                                <input type="file" name="Avatar" id="file" class="form-control form-control-lg">
                                <label class="form-label" for="file">Chọn file</label>
                            </div>

                        </div>


                        <div class="p-t-15">
                            <button name="sign-up" class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                        <div class="p-t-15">
                       <a href="./index.php"><button type="button" class="btn btn-success">Login</button></a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<style>

    
/* ==========================================================================
   #FONT
   ========================================================================== */
   .font-robo {
    font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
  }
  
  .font-poppins {
    font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
  }
  
  /* ==========================================================================
     #GRID
     ========================================================================== */
  .row {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
  }
  
  .row-space {
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
  }
  
  .col-2 {
    width: -webkit-calc((100% - 30px) / 2);
    width: -moz-calc((100% - 30px) / 2);
    width: calc((100% - 30px) / 2);
  }
  
  @media (max-width: 767px) {
    .col-2 {
      width: 100%;
    }
  }
  
  /* ==========================================================================
     #BOX-SIZING
     ========================================================================== */
  /**
   * More sensible default box-sizing:
   * css-tricks.com/inheriting-box-sizing-probably-slightly-better-best-practice
   */
  html {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  
  * {
    padding: 0;
    margin: 0;
  }
  
  *, *:before, *:after {
    -webkit-box-sizing: inherit;
    -moz-box-sizing: inherit;
    box-sizing: inherit;
  }
  
  /* ==========================================================================
     #RESET
     ========================================================================== */
  /**
   * A very simple reset that sits on top of Normalize.css.
   */
  body,
  h1, h2, h3, h4, h5, h6,
  blockquote, p, pre,
  dl, dd, ol, ul,
  figure,
  hr,
  fieldset, legend {
    margin: 0;
    padding: 0;
  }
  
  /**
   * Remove trailing margins from nested lists.
   */
  li > ol,
  li > ul {
    margin-bottom: 0;
  }
  
  /**
   * Remove default table spacing.
   */
  table {
    border-collapse: collapse;
    border-spacing: 0;
  }
  
  /**
   * 1. Reset Chrome and Firefox behaviour which sets a `min-width: min-content;`
   *    on fieldsets.
   */
  fieldset {
    min-width: 0;
    /* [1] */
    border: 0;
  }
  
  button {
    outline: none;
    background: none;
    border: none;
  }
  
  /* ==========================================================================
     #PAGE WRAPPER
     ========================================================================== */
  .page-wrapper {
    min-height: 100vh;
  }
  
  body {
    font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    font-weight: 400;
    font-size: 14px;
  }
  
  h1, h2, h3, h4, h5, h6 {
    font-weight: 400;
  }
  
  h1 {
    font-size: 36px;
  }
  
  h2 {
    font-size: 30px;
  }
  
  h3 {
    font-size: 24px;
  }
  
  h4 {
    font-size: 18px;
  }
  
  h5 {
    font-size: 15px;
  }
  
  h6 {
    font-size: 13px;
  }
  
  /* ==========================================================================
     #BACKGROUND
     ========================================================================== */
  .bg-blue {
    background: #2c6ed5;
  }
  
  .bg-red {
    background: #fa4251;
  }
  
  .bg-gra-01 {
    background: -webkit-gradient(linear, left bottom, left top, from(#fbc2eb), to(#a18cd1));
    background: -webkit-linear-gradient(bottom, #fbc2eb 0%, #a18cd1 100%);
    background: -moz-linear-gradient(bottom, #fbc2eb 0%, #a18cd1 100%);
    background: -o-linear-gradient(bottom, #fbc2eb 0%, #a18cd1 100%);
    background: linear-gradient(to top, #fbc2eb 0%, #a18cd1 100%);
  }
  
  .bg-gra-02 {
    background: -webkit-gradient(linear, left bottom, right top, from(#fc2c77), to(#6c4079));
    background: -webkit-linear-gradient(bottom left, #fc2c77 0%, #6c4079 100%);
    background: -moz-linear-gradient(bottom left, #fc2c77 0%, #6c4079 100%);
    background: -o-linear-gradient(bottom left, #fc2c77 0%, #6c4079 100%);
    background: linear-gradient(to top right, #fc2c77 0%, #6c4079 100%);
  }
  
  /* ==========================================================================
     #SPACING
     ========================================================================== */
  .p-t-100 {
    padding-top: 100px;
  }
  
  .p-t-130 {
    padding-top: 130px;
  }
  
  .p-t-180 {
    padding-top: 180px;
  }
  
  .p-t-20 {
    padding-top: 20px;
  }
  
  .p-t-15 {
    padding-top: 15px;
  }
  
  .p-t-10 {
    padding-top: 10px;
  }
  
  .p-t-30 {
    padding-top: 30px;
  }
  
  .p-b-100 {
    padding-bottom: 100px;
  }
  
  .m-r-45 {
    margin-right: 45px;
  }
  
  /* ==========================================================================
     #WRAPPER
     ========================================================================== */
  .wrapper {
    margin: 0 auto;
  }
  
  .wrapper--w960 {
    max-width: 960px;
  }
  
  .wrapper--w780 {
    max-width: 780px;
  }
  
  .wrapper--w680 {
    max-width: 680px;
  }
  
  /* ==========================================================================
     #BUTTON
     ========================================================================== */
  .btn {
    display: inline-block;
    line-height: 50px;
    padding: 0 50px;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
    cursor: pointer;
    font-size: 18px;
    color: #fff;
    font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
  }
  
  .btn--radius {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
  }
  
  .btn--radius-2 {
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
  }
  
  .btn--pill {
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
  }
  
  .btn--green {
    background: #57b846;
  }
  
  .btn--green:hover {
    background: #4dae3c;
  }
  
  .btn--blue {
    background: #4272d7;
  }
  
  .btn--blue:hover {
    background: #3868cd;
  }
  
  /* ==========================================================================
     #DATE PICKER
     ========================================================================== */
  td.active {
    background-color: #2c6ed5;
  }
  
  input[type="date" i] {
    padding: 14px;
  }
  
  .table-condensed td, .table-condensed th {
    font-size: 14px;
    font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
    font-weight: 400;
  }
  
  .daterangepicker td {
    width: 40px;
    height: 30px;
  }
  
  .daterangepicker {
    border: none;
    -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    display: none;
    border: 1px solid #e0e0e0;
    margin-top: 5px;
  }
  
  .daterangepicker::after, .daterangepicker::before {
    display: none;
  }
  
  .daterangepicker thead tr th {
    padding: 10px 0;
  }
  
  .daterangepicker .table-condensed th select {
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    font-size: 14px;
    padding: 5px;
    outline: none;
  }
  
  /* ==========================================================================
     #FORM
     ========================================================================== */
  input {
    outline: none;
    margin: 0;
    border: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    width: 100%;
    font-size: 14px;
    font-family: inherit;
  }
  
  .input--style-4 {
    line-height: 50px;
    background: #fafafa;
    -webkit-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    -moz-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    padding: 0 20px;
    font-size: 16px;
    color: #666;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
  }
  
  .input--style-4::-webkit-input-placeholder {
    /* WebKit, Blink, Edge */
    color: #666;
  }
  
  .input--style-4:-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
    color: #666;
    opacity: 1;
  }
  
  .input--style-4::-moz-placeholder {
    /* Mozilla Firefox 19+ */
    color: #666;
    opacity: 1;
  }
  
  .input--style-4:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: #666;
  }
  
  .input--style-4:-ms-input-placeholder {
    /* Microsoft Edge */
    color: #666;
  }
  
  .label {
    font-size: 16px;
    color: #555;
    text-transform: capitalize;
    display: block;
    margin-bottom: 5px;
  }
  
  .radio-container {
    display: inline-block;
    position: relative;
    padding-left: 30px;
    cursor: pointer;
    font-size: 16px;
    color: #666;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  
  .radio-container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }
  
  .radio-container input:checked ~ .checkmark {
    background-color: #e5e5e5;
  }
  
  .radio-container input:checked ~ .checkmark:after {
    display: block;
  }
  
  .radio-container .checkmark:after {
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 12px;
    height: 12px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    background: #57b846;
  }
  
  .checkmark {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #e5e5e5;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    -webkit-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    -moz-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  }
  
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }
  
  .input-group {
    position: relative;
    margin-bottom: 22px;
  }
  
  .input-group-icon {
    position: relative;
  }
  
  .input-icon {
    position: absolute;
    font-size: 18px;
    color: #999;
    right: 18px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    cursor: pointer;
  }
  
  /* ==========================================================================
     #SELECT2
     ========================================================================== */
  .select--no-search .select2-search {
    display: none !important;
  }
  
  .rs-select2 .select2-container {
    width: 100% !important;
    outline: none;
    background: #fafafa;
    -webkit-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    -moz-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
  }
  
  .rs-select2 .select2-container .select2-selection--single {
    outline: none;
    border: none;
    height: 50px;
    background: transparent;
  }
  
  .rs-select2 .select2-container .select2-selection--single .select2-selection__rendered {
    line-height: 50px;
    padding-left: 0;
    color: #555;
    font-size: 16px;
    font-family: inherit;
    padding-left: 22px;
    padding-right: 50px;
  }
  
  .rs-select2 .select2-container .select2-selection--single .select2-selection__arrow {
    height: 50px;
    right: 20px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -moz-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
  }
  
  .rs-select2 .select2-container .select2-selection--single .select2-selection__arrow b {
    display: none;
  }
  
  .rs-select2 .select2-container .select2-selection--single .select2-selection__arrow:after {
    font-family: "Material-Design-Iconic-Font";
    content: '\f2f9';
    font-size: 24px;
    color: #999;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
  }
  
  .rs-select2 .select2-container.select2-container--open .select2-selection--single .select2-selection__arrow::after {
    -webkit-transform: rotate(-180deg);
    -moz-transform: rotate(-180deg);
    -ms-transform: rotate(-180deg);
    -o-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
  
  .select2-container--open .select2-dropdown--below {
    border: none;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    border: 1px solid #e0e0e0;
    margin-top: 5px;
    overflow: hidden;
  }
  
  .select2-container--default .select2-results__option {
    padding-left: 22px;
  }
  
  /* ==========================================================================
     #TITLE
     ========================================================================== */
  .title {
    font-size: 24px;
    color: #525252;
    font-weight: 400;
    margin-bottom: 40px;
  }
  
  /* ==========================================================================
     #CARD
     ========================================================================== */
  .card {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    background: #fff;
  }
  
  .card-4 {
    background: #fff;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  }
  
  .card-4 .card-body {
    padding: 57px 65px;
    padding-bottom: 65px;
  }
  
  @media (max-width: 767px) {
    .card-4 .card-body {
      padding: 50px 40px;
    }
  }
  
</style>
</html>
<!-- end document-->