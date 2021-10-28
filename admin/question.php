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
                <a href=".teach.php"><i class="fas fa-school"></i> Teach</a>
            </li>

            <li>
                <a href="result.php"><i class="fas fa-poll"></i> Result</a>
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

                        <h1>Simple Quiz Built On PHP</h1>

                        <form action="result.php" method="post" id="quiz">

                            <ol>

                                <li>

                                    <h3>WordPress is a...</h3>

                                    <div>
                                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                                        <label for="question-1-answers-A">A) Software </label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                                        <label for="question-1-answers-B">B) Web App</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                                        <label for="question-1-answers-C">C) CMS</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                                        <label for="question-1-answers-D">D) Other</label>
                                    </div>

                                </li>

                                <li>

                                    <h3>SEO is Part Of...</h3>

                                    <div>
                                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                                        <label for="question-2-answers-A">A) Video Editing</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                                        <label for="question-2-answers-B">B) Graphic Designing</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                                        <label for="question-2-answers-C">C) Web Designing</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                                        <label for="question-2-answers-D">D) Digital Marketing</label>
                                    </div>

                                </li>

                                <li>

                                    <h3>PHP is a....</h3>

                                    <div>
                                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                                        <label for="question-3-answers-A">A) Server Side Script</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                                        <label for="question-3-answers-B">B) Programming Language</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                                        <label for="question-3-answers-C">C) Markup Language</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                                        <label for="question-3-answers-D">D) None Of Above These</label>
                                    </div>

                                </li>

                                <li>

                                    <h3>Localhost IP is..</h3>

                                    <div>
                                        <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                                        <label for="question-4-answers-A">A) 192.168.0.1</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                                        <label for="question-4-answers-B">B) 127.0.0.0</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                                        <label for="question-4-answers-C">C) 1080:80</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                                        <label for="question-4-answers-D">D) Any Other</label>
                                    </div>

                                </li>

                                <li>

                                    <h3>Webdevtrick Is For</h3>

                                    <div>
                                        <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                                        <label for="question-5-answers-A">A) Web Designer</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                                        <label for="question-5-answers-B">B) Web Developer</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                                        <label for="question-5-answers-C">C) Graphic Designer</label>
                                    </div>

                                    <div>
                                        <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                                        <label for="question-5-answers-D">D) All Above These</label>
                                    </div>

                                </li>

                            </ol>

                            <input type="submit" value="Submit" class="submitbtn" />

                        </form>

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
<