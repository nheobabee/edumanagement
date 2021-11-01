<?php include('./header.php') ?>
<br>
<a href="./learn-teach-teacher.php"><button style="padding:1% 2%;" type="button" class="btn btn-secondary text-white me-2"><i class="fas fa-undo-alt"></i></button></a>
<br><br>
<div class="all-teacher">
<h1>GIẢNG DẠY</h1>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên giáo viên</th>
            <th scope="col">Tên môn học</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * from relationship where note = 1";
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
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
</div>
<?php include('./footer.php') ?>