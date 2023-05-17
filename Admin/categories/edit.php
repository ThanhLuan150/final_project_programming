<?php
        require_once '../connect.php';// lay d can sua
        $id= $_GET['id'];
        $edit_sql="SELECT * FROM categories WHERE id_categories= $id";
        $result= mysqli_query($conn, $edit_sql);
        $row = mysqli_fetch_assoc($result);
     
// nhan dữ liệu từ form
if(isset($_POST['sbm'])){
    $name_categories= $_POST['name_categories'];
    $rent_prices = $_POST['rent_prices'];
    $created_at = $_POST['created_at'];
    $updated_at = $_POST['updated_at'];

// ket nối csdl
// viết lệnh sql sửa du lieu
$updatesql="UPDATE  categories SET  name_categories='$name_categories', rent_prices='$rent_prices', 
created_at='$created_at', updated_at='$updated_at'  WHERE id_categories= $id";
$query=mysqli_query($conn,$updatesql);

header("location: categories.php");

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
    <title>Edit categories</title>
</head>
<body>
<form  method="post">
            <div class="form-group">
                <label for="name_categories"></label>name_categories<input type="text" id="name_categories" class="form-control" name="name_categories" value="<?= $row['name_categories'] ?>"></div>
            <div class="form-group">
                <label for="rent_prices"></label>rent_prices<input type="text" id="rent_prices" class="form-control" name="rent_prices" value="<?= $row['rent_prices'] ?>"></div>
            <div class="form-group">
                <label for="created_at"></label>created_at<input type="datetime" id="created_at" class="form-control" name="created_at" value="<?= $row['created_at'] ?>"></div>
            <div class="form-group">
                <label for="updated_at"></label>updated_at<input type="datetime" id="updated_at" class="form-control" name="updated_at" value="<?= $row['updated_at'] ?>"></div>
                <button class="btn btn-success" name="sbm">Edit categories</button>
        </form>
</body>
</html>