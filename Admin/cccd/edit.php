<?php
        require_once '../connect.php';// lay d can sua
        $id= $_GET['id'];
        $edit_sql="SELECT * FROM cccd WHERE id_cccd= $id";
        $result= mysqli_query($conn, $edit_sql);
        $row = mysqli_fetch_assoc($result);
     
// nhan dữ liệu từ form
if(isset($_POST['sbm'])){
    $id_bill_detail= $_POST['id_bill_detail'];
    $front_image= $_POST['front_image'];
    $back_image= $_POST['back_image'];

// ket nối csdl
// viết lệnh sql sửa du lieu
$updatesql="UPDATE  cccd SET id_bill_detail='$id_bill_detail', front_image='$front_image', back_image='$back_image' WHERE id_cccd= $id";
$query=mysqli_query($conn,$updatesql);
header("location: cccd.php");

}
        // ket noi
      
        // lay thong tin clothes có id=$id
       
        // hien thi thong tin form
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
    <title>Edit clothes</title>
</head>
<body>
<form  method="post">
            <div class="form-group">
            <div class="form-group">
                <label for="id_bill_detail"></label>id_bill_detail<input type="number" id="id_bill_detail" class="form-control" name="id_bill_detail" value="<?= $row['id_bill_detail'] ?>"></div>
                <label for="front_image"></label>front_image<input type="text" id="front_image" class="form-control" name="front_image" value="<?= $row['front_image'] ?>"></div>
            <div class="form-group">
                <label for="back_image"></label>back_image<input type="text" id="back_image" class="form-control" name="back_image" value="<?= $row['back_image'] ?>"></div>
            <button class="btn btn-success" name="sbm">Edit cccd</button>
</form>
</body>
</html>