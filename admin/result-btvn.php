<?php
session_start();
?>
<title>STUDENT</title>
<?php include('../config/config.php');

if (!isset($_SESSION['loginok'])) {
    header('location:../login/index.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/teacher-admin.css">

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>ADMIN</h2>
            </li>
            <li>
                <a href="index.php"><i class="fas fa-chart-line"></i> Dashboard</a>
            </li>
            <li>
                <a href="teacher.php"><i class="fas fa-chalkboard-teacher"></i> Teacher</a>
            </li>
            <li>
                <a href="student.php"><i class="fas fa-user-graduate"></i> Student</a>
            </li>
            <li>
                <a href="subject.php"><i class="fas fa-book"></i> Subject</a>
            </li>
            <li>
                <a href="teach.php"><i class="fas fa-school"></i> Teach</a>
            </li>

            <li>
                <a href="result-admin.php"><i class="fas fa-poll"></i> Result</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fas fa-bars"></i></a>

                            <form class="d-flex">
                                <a href="" class="navbar-brand">HOME</a>
                                <a href="" class="navbar-brand">ACCOUNT</a>
                                <a href="../login/logout.php" class="navbar-brand">LOGOUT</a>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <div class="container">
                        <h1>Result</h1>

                        <?php

                        $answer1 = $_POST['question-1-answers'];
                        $answer2 = $_POST['question-2-answers'];
                        $answer3 = $_POST['question-3-answers'];
                        $answer4 = $_POST['question-4-answers'];
                        $answer5 = $_POST['question-5-answers'];

                        $totalCorrect = 0;

                        if ($answer1 == "C") {
                            $totalCorrect++;
                        }
                        if ($answer2 == "D") {
                            $totalCorrect++;
                        }
                        if ($answer3 == "A") {
                            $totalCorrect++;
                        }
                        if ($answer4 == "B") {
                            $totalCorrect++;
                        }
                        if ($answer5 == "D") {
                            $totalCorrect++;
                        }

                        echo "<div id='results'>$totalCorrect / 5 correct</div>";

                        ?>

                    </div>


                    <style>
                        body {
                            font: 14px Georgia, serif;
                        }

                        #page-wrap {
                            width: 500px;
                            margin: 0 auto;
                        }

                        h1 {
                            margin: 25px 0;
                            font: 18px Georgia, Serif;
                            text-transform: uppercase;
                            letter-spacing: 3px;
                        }

                        #quiz input {
                            vertical-align: middle;
                        }

                        #quiz ol {
                            margin: 0 0 10px 20px;
                        }

                        #quiz ol li {
                            margin: 0 0 20px 0;
                        }

                        #quiz ol li div {
                            padding: 4px 0;
                        }

                        #quiz h3 {
                            font-size: 17px;
                            margin: 0 0 1px 0;
                            color: #666;
                        }

                        #results {
                            font: 44px Georgia, Serif;
                        }
                    </style>

                </div>
            </div>
        </div>
    </div>
    <footer>
        <p class="ftr text-center">
            QTV - Do your best, the rest will come!
        </p>
    </footer>
</div>
<!-- /#page-content-wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</div>
<!-- /#wrapper -->