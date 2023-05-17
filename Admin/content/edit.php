<?php
        require_once '../connect.php';// lay d can sua
        $id= $_GET['id'];
        $edit_sql="SELECT * FROM contents WHERE id_contents= $id";
        $result= mysqli_query($conn, $edit_sql);
        $row = mysqli_fetch_assoc($result);
     
// nhan dữ liệu từ form
if(isset($_POST['sbm'])){
    $id_categories= $_POST['id_categories'];
    $description= $_POST['description'];

// ket nối csdl
// viết lệnh sql sửa du lieu
$updatesql="UPDATE  contents SET id_categories='$id_categories', description='$description' WHERE id_contents= $id";
$query=mysqli_query($conn,$updatesql);
header("location: content.php");

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
                <label for="id_categories"></label>id_categories<input type="number" id="id_categories" class="form-control" name="id_categories" value="<?= $row['id_categories'] ?>"></div>
                <label for="description"></label>description<input type="text" id="description" class="form-control" name="description" value="<?= $row['description'] ?>"></div>
           <button class="btn btn-success" name="sbm">Edit cccd</button>
</form>
</body>
</html>