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
  $search = $_GET['search'];
  $search_sql = "SELECT * FROM users WHERE username = '$search'";
  $result = mysqli_query($conn, $search_sql);

  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    // display search result
    echo "<table class='table'>
            <thead class='thead-dark'>
            <tr>
            <th>ID</th>
            <th>Username</th>
            <th>password</th>
            <th>confirm_password</th>
            <th>email</th>
        </tr>
            </thead>
            <tbody>
              <tr>
                <td>".$row['id_users']."</td>
                <td>".$row['username']."</td>
                <td>".$row['password']."</td>
                <td>".$row['confirm_password']."</td>
                <td>".$row['email']."</td>
            </tbody>
          </table>";
  } else {
    echo "<p>No results found</p>";
  }
} else {
  echo "<p>Please enter an name to search</p>";
}
?> 
</body>
</html>

