<?php include('./header.php') ?>
<h2>Đăng kí bài tập lớn</h2>
<form method="post">
    <?php
    if (isset($_POST['dkbtl'])) {

        $nameTeam = $_POST['nameTeam'];
        $nameST1 = $_POST['nameST1'];
        $nameST2 = $_POST['nameST2'];
        $nameST3 = $_POST['nameST3'];
        $idBTL = $_POST['idBTL'];


        $sql = "INSERT INTO `btlsv`(`idTeam`, `nameTeam`, `nameST1`, `nameST2`, `nameST3`, `idBTL`) 
                                VALUES ('','$nameTeam','$nameST1',' $nameST2','$nameST3','$idBTL')";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            header('location: subject.php');
        } else {
            echo 'Lỗi';
            echo $sql;
        }
    }
    ?>
    <?php
    // lấy giá trị name của bài tập lớn
    if (isset($_GET['idBTL'])) {
        $idBTL = $_GET['idBTL'];

        //lấy giá trị từ bảng
        $sqll = "SELECT * FROM btl WHERE idBTL = '$idBTL'";
        $kql = mysqli_query($conn, $sqll);
        if ($kql) {
            $row = mysqli_fetch_assoc($kql);
            $nameBTL_q = $row['nameBTL'];
        }
    }
    ?>

    <div class="form-group">
        <label for="nameBTL">Tên nhóm:</label>
        <input type="text" class="form-control" id="nameTeam" placeholder="Enter name" name="nameTeam">
    </div>

    <div class="form-group">
        <label for="nameST1">Tên thành viên 1:</label>
        <input type="text" class="form-control" id="nameST1" placeholder="Enter name" name="nameST1">
    </div>
    <div class="form-group">
        <label for="nameST2">Tên thành viên 2:</label>
        <input type="text" class="form-control" id="nameST2" placeholder="Enter name" name="nameST2">
    </div>
    <div class="form-group">
        <label for="nameST3">Tên thành viên 3:</label>
        <input type="text" class="form-control" id="nameST3" placeholder="Enter name" name="nameST3">
    </div>
    <div class="form-group">
        <label for="nameST3">Tên BTL:</label>
        <span><?php echo $nameBTL_q ?></span>
        <input readonly type="text" class="form-control" id="idBTL" placeholder="Enter name" name="idBTL" value="<?php echo $idBTL ?>">
    </div>


    <?php include('./footer.php') ?>