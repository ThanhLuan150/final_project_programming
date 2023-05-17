<?php
        require_once '../connect.php';// lay d can sua
        $id= $_GET['id'];
        $edit_sql="SELECT * FROM clothes WHERE id_clothes= $id";
        $result= mysqli_query($conn, $edit_sql);
        $row = mysqli_fetch_assoc($result);
     
// nhan dữ liệu từ form
if(isset($_POST['sbm'])){
$image= $_POST['image'];
$name_clothes= $_POST['name_clothes'];
$sex= $_POST['sex'];
$description = $_POST['description'];
$id_categories = $_POST['id_categories'];
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];

// ket nối csdl
// viết lệnh sql sửa du lieu
$updatesql="UPDATE  clothes SET image='$image', name_clothes='$name_clothes', sex='$sex', description='$description', 
 id_categories='$id_categories', created_at='$created_at', updated_at='$updated_at'  WHERE id_clothes= $id";
$query=mysqli_query($conn,$updatesql);

header("location: clothes.php");

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
                <label for="image"></label>image<input type="text" id="image" class="form-control" name="image" value="<?= $row['image'] ?>"></div>
            <div class="form-group">
                <label for="name_clothes"></label>name_clothes<input type="text" id="name_clothes" class="form-control" name="name_clothes" value="<?= $row['name_clothes'] ?>"></div>
            <div class="form-group">
                <label for="sex"></label>Sex<input type="text" id="sex" class="form-control" name="sex" value="<?= $row['sex'] ?>"></div>
            <div class="form-group">
                <label for="description"></label>description<input type="text" id="description" class="form-control" name="description" value="<?= $row['description'] ?>"></div>
            <div class="form-group">
                <label for="id_categories"></label>Id_categories<input type="number" id="id_categories" class="form-control" name="id_categories" value="<?= $row['id_categories'] ?>"></div>
            <div class="form-group">
                <label for="created_at"></label>created_at<input type="datetime" id="created_at" class="form-control" name="created_at" value="<?= $row['created_at'] ?>"></div>
            <div class="form-group">
                <label for="updated_at"></label>updated_at<input type="datetime" id="updated_at" class="form-control" name="updated_at" value="<?= $row['updated_at'] ?>"></div>
                <button class="btn btn-success" name="sbm">Edit clothes</button>
        </form>
</body>
</html>
