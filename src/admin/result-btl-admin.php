<!-- <link rel="stylesheet" href="../../css/result-admin.css"> -->
<?php include('./header.php') ?>
<br>
<a href="./result-admin.php"><button style="padding:1% 2%;" type="button" class="btn btn-secondary text-white me-2"><i class="fas fa-undo-alt"></i></button></a>

<br><br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên SV</th>
            </th>
            <th scope="col">Tên BTVN</th>
            <th scope="col">Điểm</th>
            <th scope="col">Nhận xét</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * from ketquabtl";
        $res = mysqli_query($conn, $sql);
        $sn = 1;
        if ($res == true) {
            while ($row = mysqli_fetch_assoc($res)) {
                $idBTL = $row['idBTL'];
                $sql3 = "SELECT * FROM btl WHERE idBTL = '$idBTL'";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);

                $user_id = $row['user_id'];
                $sql2 = "SELECT * FROM users WHERE user_id = '$user_id'";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
        ?>
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $row2['user_name']; ?></td>
                    <td><?php echo $row3['nameBTL']; ?></td>
                    <td><?php echo $row['markBTL']; ?></td>
                    <td><?php echo $row['cmtBTL']; ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<?php include('./footer.php') ?>