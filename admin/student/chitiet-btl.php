<?php include('./header.php') ?>
<?php
if (isset($_GET['idBTL'], $_GET['idMH'],$_GET['user_id'])) {
    $idBTL = $_GET['idBTL'];
    $idMH = $_GET['idMH'];
    $user_id = $_GET['user_id'];
    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
}
?>
<!-- <div class="btn-chucnang">
    <a href="./dk-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-success text-white"><i class="fas fa-edit"></i> Đăng kí</button></a>
    <a href="./dsnhom-btl-admin.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-info text-white "><i class="far fa-eye"></i>Danh sách nhóm</button></a>

</div> -->
<br>
<form action="" method="post">
    <?php
        if(isset($_POST['dangki'])){      
            $sqlcheck = "SELECT * FROM  `dkbtl` WHERE user_id = $user_id";
            $rescheck = mysqli_query($conn,$sqlcheck);
            $count = mysqli_num_rows($rescheck);

            $sqlchecksl = "SELECT * FROM  `dkbtl` WHERE idBTL = $idBTL";
            $reschecksl = mysqli_query($conn,$sqlchecksl);
            $countsl = mysqli_num_rows($reschecksl);

            if( $countsl<3){
                if($count<1){         
                    $sql2 = "INSERT INTO `dkbtl`(`user_id`, `idBTL`, `idMH`, `note`) 
                    VALUES ('$user_id','$idBTL','$idMH','')";
                     $kq2 = mysqli_query($conn, $sql2);
        
                     if ($kq2) {                
                         $_SESSION['success'] = 'Đăng kí thành công';
                         header("Location:http://localhost/edumanagement/admin/student/btl.php?idMH=".$idMH);
                     } else {
                        $_SESSION['error'] = 'Bạn đã đăng kí bài tập lớn rồi';
                        header("Location:http://localhost/edumanagement/admin/student/btl.php?idMH=".$idMH);
                     }
                    }
                    else{
                        $_SESSION['errorcheck'] = 'Bạn đã đăng kí bài tập lớn rồi';
                        header("Location:http://localhost/edumanagement/admin/student/btl.php?idMH=".$idMH);
                    }                
            }
            else{
                $_SESSION['errorchecksl'] = 'Bài tập lớn này đã đủ thành viên Vui lòng chọn bài tập lớn khác';
                header("Location:http://localhost/edumanagement/admin/student/btl.php?idMH=".$idMH);
            }
            
        }

    ?>
     <?php
        if(isset($_POST['huydangki'])){
            $sqlcheck = "SELECT * FROM  `dkbtl` WHERE user_id = $user_id";
            $rescheck = mysqli_query($conn,$sqlcheck);
            $count = mysqli_num_rows($rescheck);
            if($count>0){         
            $sql2 = "DELETE FROM `dkbtl` WHERE user_id = $user_id AND idBTL = $idBTL";
             $kq2 = mysqli_query($conn, $sql2);

             if ($kq2) {                
                 $_SESSION['csuccess'] = 'Hủy đăng kí thành công';
                 header("Location:http://localhost/edumanagement/admin/student/btl.php?idMH=".$idMH);
             } else {
                $_SESSION['cerror'] = 'Không thể hủy vì bạn chưa đăng ký';
                header("Location:http://localhost/edumanagement/admin/student/btl.php?idMH=".$idMH);
               
             }
            }
            else{
                $_SESSION['cerrorcheck'] = 'Không thể hủy vì bạn chưa đăng ký';
                header("Location:http://localhost/edumanagement/admin/student/btl.php?idMH=".$idMH);
                
            }
        }

    ?>
<div class="tittle-mh">
    <h2><?php echo $nameMH; ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btl WHERE idMH = '$idMH' AND idBTL = '$idBTL'";
$res3 = mysqli_query($conn, $sql3);
while ($row3 = mysqli_fetch_assoc($res3)) { ?>
    <div class="title-btvn">
        <div class="name-btvn row">

            <div class="content-btvn col">

                <h6><?php echo $row3['nameBTL'] ?></h6>
                <label for="empEmail" class="col-sm-3 col-form-label">Đề bài:</label>
                <div class="form-group">
                    <h6><?php echo $row3['filenamebtl'] ?></h6>
                    <a href="download-exercise.php?file=<?php echo $row3['filenamebtl'] ?>"> <button class="btn btn-success text-white me-2"><i class="fas fa-download"></i>Tải đề</button></a>
                    <button type="submit" class="btn btn-success text-white me-4 col-3" name="dangki"><i class="fas fa-edit"></i> Đăng kí</button>
                    <button type="submit" class="btn btn-success text-white me-4 col-3" name="huydangki"><i class="fas fa-edit"></i>Hủy đăng kí</button>
                    <a href="./dsnhom-btl.php?idBTL=<?php echo $row3['idBTL']; ?>"><button type="button" class="btn btn-info text-white me-4 col-3"><i class="far fa-eye"></i>Danh sách nhóm</button></a>
                    <a href="send-btl.php?idBTL=<?php echo $row3['idBTL']; ?>&&idMH=<?php echo $row3['idMH']; ?>&&user_id=<?php echo $_SESSION['user_id']; ?>"><button type="button" class="btn btn-success text-white me-2"><i class="fas fa-upload"></i>NỘP BÀI</i></button></a>
                </div>

            </div>
        </div>

    </div>
    </div>
    </form>
    </div>
<?php
}

?>
<?php include('./footer.php') ?>