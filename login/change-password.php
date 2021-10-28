<?php include('../config/config.php');
session_start();
if (!isset($_SESSION['check-passforgot'])) {
    header('location:forgot-ppas.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!--Section: Block Content-->
    <div class="container">
        <section class="mb-5 text-center">

            <p>Set a new password</p>

            <form action="#!" method="POST">

                <div class="md-form md-outline">
                    <input name="pass1" type="password" id="newPass" class="form-control">
                    <label data-error="wrong" data-success="right" for="newPass">New password</label>
                </div>

                <div class="md-form md-outline">
                    <input name="pass2" type="password" id="newPassConfirm" class="form-control">
                    <label data-error="wrong" data-success="right" for="newPassConfirm">Confirm password</label>
                </div>

                <button name="change" type="submit" class="btn btn-primary mb-4">Change password</button>

            </form>

            <div class="d-flex justify-content-between align-items-center mb-2">

                <u><a href="https://mdbootstrap.com/docs/jquery/admin/auth/login/">Back to Log In</a></u>

                <u><a href="https://mdbootstrap.com/docs/jquery/admin/auth/register/">Register</a></u>

            </div>

        </section>
    </div>
    <!--Section: Block Content-->
</body>
<?php
if (isset($_POST['change'])) {
    $email = $_GET['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if ($pass1 == $pass2) {
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
        $sql  = "update db_users set user_pass='$pass_hash' where user_email ='$email'";
        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            header('location:./index.php');
        } else {
            echo "fail";
        }
    }
}
?>

</html>