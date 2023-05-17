<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
require_once '../connect.php';

if(isset($_GET['search']) && !empty($_GET['search'])){
  $search_id = $_GET['search'];
  $search_sql = "SELECT * FROM clothes WHERE id_categories = $search_id";
  $result = mysqli_query($conn, $search_sql);

  if(mysqli_num_rows($result) > 0){
?>
    <table class='table'>
            <thead class='thead-dark'>
                <tr>
                        <th>ID</th>
                        <th>name clothes</th>
                        <th>image</th>
                        <th>Sex</th>
                        <th>description</th>
                        <th>id_categories</h>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>function</th> 
                    </tr>
            </thead>
            <tbody>
            <?php while($row= mysqli_fetch_assoc($result)){?>
                    <tr>
                        <td><?php echo $row['id_clothes']; ?></td>
                        <td><?= $row['name_clothes']; ?></td>
                        <td><img style="width:100px;" src=<?php echo $row['image']; ?>></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td> <?= $row['id_categories'];?></td>
                        <td><?php echo $row['created_at']; ?></td>
                      
                        <td><?php echo $row['updated_at']; ?></td>  
                        <td>
                        <a href="edit.php?id=<?php echo $row['id_clothes']; ?>" class="btn btn-success"> sửa</a>
                            <a onclick="return confirm ('bạn có muốn xóa clothes này không');"
                              href="delete.php?id=<?php echo $row['id_clothes']; ?>" class="btn btn-danger">xóa
                        </td> 
                    </tr> 
            <?php } ?>
            </tbody>
          </table>";
  <?php
  } else {
    echo "<p>No results found</p>";
  }
} else {
  echo "<p>Please enter an id to search</p>";
}
?> 
</body>
</html>