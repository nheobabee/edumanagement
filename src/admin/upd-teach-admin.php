<!-- <link rel="stylesheet" href="../../css/add-teach-admin.css"> -->
<?php include('./header.php') ?>
<?php
if (isset($_GET['user_id'])) {
    $user_id1 = $_GET['user_id'];

    $sql0 = "SELECT * FROM relationship WHERE user_id = '$user_id1'";
    $res0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($res0);
    $idMH1 = $row0['idMH'];
    $sql1 = "SELECT * FROM monhoc WHERE idMH = '$idMH1'";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH1 = $row1['nameMH'];

    $sql2 = "SELECT * FROM users WHERE user_id = '$user_id1'";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $user_name1 = $row2['user_name'];
}
?>
<br><br>
<form class="form-add" method="post">
    <h2>CẬP NHẬT GIÁO VIÊN</h2>
    <br>
    <?php


    if (isset($_POST['add'])) {
        $user_id =  $_POST['user_id'];
        $idMH = $_POST['idMH'];
        // Bước 2 câu lệnh truy vấn
        $sql7 = "UPDATE relationship SET 
        idMH = '$idMH'
        where user_id = '$user_id' ";


        $result7 = mysqli_query($conn, $sql7);

        if ($result7 > 0) {
            echo "Bản ghi đã được lưu";
            header("Location: http://localhost/edumanagement/src/admin/teach.php");
        } else {
            echo "Lỗi";
        }
    }

    ?>
    <?php
    // lấy giá trị user cần sửa 


    ?>
    <div class="form-group ">
        <label style="display: inline" for="idMH" class="col-sm-2 col-form-label">Tên giáo viên:</label>
        <div class="col-sm-10">
            <select name="user_id">
                <?php
                $sql4 = "SELECT * FROM users WHERE user_id = '$user_id1'";
                $result4 = mysqli_query($conn, $sql4);
                //  if (sqlsrv_num_rows($result) > 0) {
                while ($row4 = mysqli_fetch_assoc($result4)) {
                    $user_id = $row4['user_id'];
                    $user_name = $row4['user_name'];
                ?>
                    <option <?php if ($user_id1 == $user_id) {
                                echo "selected";
                            } ?> value="<?php echo $user_id; ?>"><?php echo $user_name; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group ">
        <label style="display: inline" for="idMH" class="col-sm-2 col-form-label">Tên môn học</label>
        <div class="col-sm-10">
            <select name="idMH">
                <?php
                $sql5 = "SELECT * FROM monhoc";
                $result5 = mysqli_query($conn, $sql5);
                //  if (sqlsrv_num_rows($result) > 0) {
                while ($row5 = mysqli_fetch_assoc($result5)) {
                    $idMH = $row5['idMH'];
                    $nameMH = $row5['nameMH'];
                ?>
                    <option <?php if ($idMH1 == $idMH) {
                                echo "selected";
                            } ?> value="<?php echo $idMH; ?>"><?php echo $nameMH; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">

        <input hidden type="text" class="form-control" id="note" placeholder="Ghi chú" name="note" value="1">
    </div>
    <br>
    <button name="add" type="submit" class="btn btn-success"><i class="fas fa-pen"></i> Cập nhật</button>
</form>
<?php include('./footer.php') ?>