<?php include('./header.php') ?>
<br>
<a href="./learn-teach-teacher.php"><button style="padding:1% 2%;" type="button" class="btn btn-secondary text-white me-2"><i class="fas fa-undo-alt"></i></button></a>
<br>

<br>
<div class="all-teacher">
<h1>HỌC TẬP</h1>
<?php 
    if(isset($_SESSION['successDelLearn'])){
        echo $_SESSION['successDelLearn'];
        unset($_SESSION['successDelLearn']);
    }
    if(isset($_SESSION['errorDelLearn'])){
        echo $_SESSION['errorDelLearn'];
        unset($_SESSION['errorDelLearn']);
    }
?>
<?php 
    $user_id = $_SESSION['user_id'];
    $sql0 = "SELECT * from relationship where user_id = '$user_id'";
    $res0 = mysqli_query($conn,$sql0);
    $row0 = mysqli_fetch_assoc($res0);
    $idMH0 = $row0['idMH'];
?>
<br>
<a href="./add-learn-teacher.php"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-plus"></i> Thêm sinh viên</button></a>

<br><br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Tên môn học</th>
            <th scope="col">Xóa</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * from relationship where note = 0 and idMH = '$idMH0'";
        $res = mysqli_query($conn, $sql);
        $sn = 1;
        if ($res == true) {
            while ($row = mysqli_fetch_assoc($res)) {
                $user_id = $row['user_id'];
                $idMH = $row['idMH'];

                $sql3 = "SELECT * FROM users WHERE user_id = '$user_id'";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);


                $sql2 = "SELECT * FROM monhoc WHERE idMH = '$idMH'";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);

        ?>
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $row3['user_name']; ?></td>
                    <td><?php echo $row2['nameMH']; ?></td>
                    <td>
                        <a href="./del-learn-teacher.php?user_id=<?php echo $user_id ?>&&idMH=<?php echo $idMH ?>"><button type="button" class="btn btn-danger text-white me-2"><i class="fas fa-trash-alt"></i></button></a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
</div>
<?php include('./footer.php') ?>