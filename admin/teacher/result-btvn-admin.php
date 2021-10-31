<?php include('./header.php') ?>
<br>
<a href="."><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-plus"></i>ADD</i></button></a>
<br><br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">NameSV</th>
            <th scope="col">NameBTVN</th>
            <th scope="col">Mark</th>
            <th scope="col">Comment</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * from ketquabtvn";
        $res = mysqli_query($conn, $sql);
        $sn = 1;
        if ($res == true) {
            while ($row = mysqli_fetch_assoc($res)) {
                $idBTVN = $row['idBTVN'];
                $sql3 = "SELECT * FROM btvn WHERE idBTVN = '$idBTVN'";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);

                $idSV = $row['idSV'];
                $sql2 = "SELECT * FROM sinhvien WHERE idSV = '$idSV'";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);

        ?>
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $row2['nameSV']; ?></td>
                    <td><?php echo $row3['nameBTVN']; ?></td>
                    <td><?php echo $row['markBTVN']; ?></td>
                    <td><?php echo $row['cmtBTVN']; ?></td>
                    <td>
                        <a href="./upd-result-btvn-admin.php?idBTVN=<?php echo $row['idBTVN']; ?>&&idSV=<?php echo $row['idSV']; ?>"><button type="button" class="btn btn-primary text-white me-2"><i class="fas fa-user-edit"></i></button></a>
                    </td>

                    <td>
                        <a href="./del-result-btvn-admin.php?idBTVN=<?php echo $row['idBTVN']; ?>&&idSV=<?php echo $row['idSV']; ?>"><button type="button" class="btn btn-danger text-white me-2"><i class="fas fa-user-minus"></i></button></a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<?php include('footer.php'); ?>