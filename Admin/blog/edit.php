<?php
        require_once '../connect.php';// lay d can sua
        $id= $_GET['id'];
        $edit_sql="SELECT * FROM blogs WHERE id_blogs= $id";
        $result= mysqli_query($conn, $edit_sql);
        $row = mysqli_fetch_assoc($result);
     
// nhan dữ liệu từ form
if(isset($_POST['sbm'])){
    $name_blogs= $_POST['name_blogs'];
    $image= $_POST['image'];
    $description = $_POST['description'];

// ket nối csdl
// viết lệnh sql sửa du lieu
$updatesql="UPDATE  blogs SET name_blogs='$name_blogs', image='$image', description='$description'  WHERE id_blogs= $id";
$query=mysqli_query($conn,$updatesql);

header("location: blog.php");

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
                <label for="name_blogs"></label>name_blogs<input type="text" id="name_blogs" class="form-control" name="name_blogs" value="<?= $row['name_blogs'] ?>"></div>
            <div class="form-group">
                <label for="image"></label>image<input type="text" id="image" class="form-control" name="image" value="<?= $row['image'] ?>"></div>
            <div class="form-group">
                <label for="description"></label>description<input type="text" id="description" class="form-control" name="description" value="<?= $row['description'] ?>"></div>
                <div class="form-group">
                <label for="description"></label>description<input type="text" id="description" class="form-control" name="description" value="<?= $row['description'] ?>"></div>
                <div class="form-group">
                <label for="description"></label>description<input type="text" id="description" class="form-control" name="description" value="<?= $row['description'] ?>"></div>
                <button class="btn btn-success" name="sbm">Edit blog</button>
        </form>
</body>
</html>