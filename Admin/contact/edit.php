<?php
        require_once '../connect.php';// lay d can sua
        $id= $_GET['id'];
        $edit_sql="SELECT * FROM lienhe WHERE id_lienhe= $id";
        $result= mysqli_query($conn, $edit_sql);
        $row = mysqli_fetch_assoc($result);
     
// nhan dữ liệu từ form
if(isset($_POST['sbm'])){
    $nameuser= $_POST['nameuser'];
    $email = $_POST['email'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];

// ket nối csdl
// viết lệnh sql sửa du lieu
$updatesql="UPDATE  lienhe SET nameuser='$nameuser', email='$email', tieude='$tieude',noidung='$noidung'  WHERE id_lienhe= $id";
$query=mysqli_query($conn,$updatesql);

header("location: contact.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit blog</title>
</head>
<body>
<form  method="post">
<div class="form-group">
                <label for="nameuser"></label>nameuser<input type="text" id="nameuser" class="form-control" name="nameuser" value="<?= $row['nameuser'] ?>"></div>
            <div class="form-group">
                <label for="email"></label>email<input type="text" id="email" class="form-control" name="email" value="<?= $row['email'] ?>"></div>
            <div class="form-group">
                <label for="tieude"></label>tieude<input type="text" id="tieude" class="form-control" name="tieude" value="<?= $row['tieude'] ?>"></div>
                <div class="form-group">
                <label for="noidung"></label>noidung<input type="text" id="noidung" class="form-control" name="noidung" value="<?= $row['noidung'] ?>"></div>
                <button class="btn btn-success" name="sbm">Edit blog</button>
        </form>
</body>
</html>