<?php include('./header.php') ?>
<br>
<div class="header-page">
    <h1 class="page-title">STUDENT</h1>
    <!--  -->
    <?php
    if (isset($_SESSION['display-username'])) {
        echo $_SESSION['display-username'];
    }
    ?>
</div>

<?php
if (isset($_SESSION['errorDel'])) {
    echo $_SESSION['errorDel'];
    unset($_SESSION['errorDel']);
}
if (isset($_SESSION['successDel'])) {
    echo $_SESSION['successDel'];
    unset($_SESSION['successDel']);
}

?>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">SDT</th>
            <th scope="col">Address</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * from users where user_level = 0";
        $res = mysqli_query($conn, $sql);
        $sn = 1;
        if ($res == true) {
            while ($row = mysqli_fetch_assoc($res)) {
                $user_gioitinh = $row['user_gioitinh'];
                $user_id = $row['user_id'];
        ?>
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td>
                        <?php if ($user_gioitinh == 1) {
                            echo 'Nam';
                        }
                        if ($user_gioitinh == 0) {
                            echo 'Nữ';
                        }
                        ?>
                    </td>
                    <td><?php echo $row['user_birthday']; ?></td>
                    <td><?php echo $row['user_phone']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>

                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<?php include('./footer.php') ?>