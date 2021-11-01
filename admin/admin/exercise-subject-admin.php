<!-- <link rel="stylesheet" href="../../css/ex-stu-ad.css"> -->
<?php include('./header.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php
if (isset($_GET['idMH'])) {
    $idMH = $_GET['idMH'];

    $sql1 = "SELECT * FROM monhoc where idMH = $idMH";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $nameMH = $row1['nameMH'];
}
?>
<br>
<a href="http://localhost/edumanagement/admin/admin/view-subject-admin.php?idMH=<?php echo $idMH ?>"><button style="padding:1% 2%;" type="button" class="btn btn-secondary text-white me-2"><i class="fas fa-undo-alt"></i></button></a>
<br><br>
<h1 class="title-btl">BÀI TẬP VỀ NHÀ</h1>
<br>
<div class="tittle-mh">
    <h2><?php echo $nameMH ?></h2>
</div>
<?php
$sql3 = "SELECT * FROM btvn WHERE idMH = '$idMH'";
$res3 = mysqli_query($conn, $sql3);
if ($res3 == true) {
    while ($row3 = mysqli_fetch_assoc($res3)) {

?>
        <div class="title-btvn">

            <div class="name-btvn row">

                <div class="content-btvn col-md-7">
                    <h6><?php echo $row3['nameBTVN'] ?></h6>
                    <p><span style="font-weight: 500;">Hình thức: </span><?php echo $row3['formatBTVN'] ?></p>
                    <p><span style="font-weight: 500;">Opened: </span><?php echo $row3['openedBTVN'] ?></p>
                    <p><span style="font-weight: 500;">Deadline: </span><?php echo $row3['deadlineBTVN'] ?></p>
                    <p>Ghi chú: <?php echo $row3['note'] ?></p>

                </div>

            </div>
        </div>
<?php
    }
}
?>

<button type="submit" id="hide" onclick="Show()">Bình luận</button>
<div class="container" id="form">
    <form method="POST" id="comment_form">
        <div class="form-group">
            <input type="text"  value="<?php echo $_SESSION['name'] ?>" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
        </div>
        <div class="form-group">
            <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="comment_id" id="comment_id" value="0" >
            <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" >
        </div>
    </form>
    <span id="comment_message"></span>
    <br>
    <div id="display_comment"></div>
</div>
<script>
    document.getElementById("form").style.display = "none";
function Show() {
  if (document.getElementById("form").style.display === "none") {
    document.getElementById("form").style.display = "block";

  } else {
    document.getElementById("form").style.display = "none";
  }
}

    $(document).ready(function() {

        $('#comment_form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "add_comment.php",
                method: "POST",
                data: form_data,
                dataType: "JSON",
                success: function(data) {
                    if (data.error != '') {
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#comment_id').val('0');
                        load_comment();
                    }
                }
            })
        });

        load_comment();

        function load_comment() {
            $.ajax({
                url: "fetch_comment.php",
                method: "POST",
                success: function(data) {
                    $('#display_comment').html(data);
                }
            })
        }

        $(document).on('click', '.reply', function() {
            var comment_id = $(this).attr("id");
            $('#comment_id').val(comment_id);
            $('#comment_name').focus();
        });

    });
</script>
<?php include('./footer.php') ?>