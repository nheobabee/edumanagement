<?php include('./header.php') ?>
<br>
<div class="all-dashboard">
    
<div class="header-page">
                                <h1 class="page-title">THỐNG KÊ</h1>
                                <!--  -->
                            <?php
                            if(isset($_SESSION['display-username']))
                            {
                                        echo $_SESSION['display-username'];
                            }
                            ?>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col text-center">
                                    <?php
                                    $sql1 = "SELECT * FROM users where user_level = 1";
                                    $res1 = mysqli_query($conn, $sql1);
                                    $count1 = mysqli_num_rows($res1);
                                    ?>
                                    <h1 class="count"><?php echo $count1 ?></h1>
                                    <br>
                                    <p>Giáo viên</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql2 = "SELECT * FROM users where user_level = 2";
                                    $res2 = mysqli_query($conn, $sql2);
                                    $count2 = mysqli_num_rows($res2);
                                    ?>
                                    <h1 class="count"><?php echo $count2 ?></h1>
                                    <br>
                                    <p>Sinh viên</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql3 = "SELECT * FROM btvn";
                                    $res3 = mysqli_query($conn, $sql3);
                                    $count3 = mysqli_num_rows($res3);
                                    ?>
                                    <h1 class="count"><?php echo $count3 ?></h1>
                                    <br>
                                    <p>Bài tập về nhà</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql4 = "SELECT * FROM btl";
                                    $res4 = mysqli_query($conn, $sql4);
                                    $count4 = mysqli_num_rows($res4);
                                    ?>
                                    <h1 class="count"><?php echo $count4 ?></h1>
                                    <br>
                                    <p>Bài tập lớn</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql5 = "SELECT * FROM monhoc";
                                    $res5 = mysqli_query($conn, $sql5);
                                    $count5 = mysqli_num_rows($res5);
                                    ?>
                                    <h1 class="count"><?php echo $count5 ?></h1>
                                    <br>
                                    <p>Môn học</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql6 = "SELECT * FROM ketquabtl, ketquabtvn";
                                    $res6 = mysqli_query($conn, $sql6);
                                    $count6 = mysqli_num_rows($res6);
                                    ?>
                                    <h1 class="count"><?php echo $count6 ?></h1>
                                    <br>
                                    <p>Kết quả</p>
                                </div>
                                <div class="col text-center">
                                    <?php
                                    $sql7 = "SELECT * FROM users";
                                    $res7 = mysqli_query($conn, $sql7);                                   
                                    $count7 = mysqli_num_rows($res7);
                                    ?>
                                    <h1 class="count"><?php echo $count7 ?></h1>
                                    <br>
                                    <p>Người dùng</p>
                                </div>
                            </div>
</div>

<?php include('./footer.php') ?>
                        
                   