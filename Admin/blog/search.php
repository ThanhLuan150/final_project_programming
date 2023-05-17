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
  $search_sql = "SELECT * FROM blogs WHERE id_blogs = $search_id";
  $result = mysqli_query($conn, $search_sql);

  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    // display search result
    echo "<table class='table'>
            <thead class='thead-dark'>
              <tr>
                <th>id_blogs</th>
                <th>image</th>
                <th>name_blogs</th>
                <th>description</th>
                <th>function</th> 
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>".$row['id_blogs']."</td>
                <td><img style='width:100px;' src=".$row['image']."></td>
                <td>".$row['name_blogs']."</td>
                <td>".$row['description']."</td>
                <td>
                  <a href='edit.php?id=".$row['id_blogs']."' class='btn btn-success'>sửa</a>
                  <a onclick='return confirm(\"bạn có muốn xóa blog này không\");' href='delete.php?id=".$row['id_blogs']."' class='btn btn-danger'>xóa</a>
                </td>
              </tr>
            </tbody>
          </table>";
  } else {
    echo "<p>No results found</p>";
  }
} else {
  echo "<p>Please enter an id to search</p>";
}
?> 
</body>
</html>

