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
  <style>
.logo img {
  border-radius: 50%;
}
body{
  background-color: #B0E0E6;
}
table{
  width: 100%;
  border: 4px solid white;
  color: white;
  background-color: white;
}
h1{
  color: black;
}
h2{
  color: black;
}
.menu {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 20px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {
  float: left;
}

.menu li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.menu li a:hover {
  background-color: white;
}

</style>
</head>
<body>
    <div class="logo">
          <img src="https://s120-ava-talk.zadn.vn/2/2/f/0/13/120/d6032707f2e221caa1043bae8f155dd5.jpg" alt="">
    </div>
    <h1> content page</h1>
    <div class="menu">
        <ul>
          <li><a href="../admin.php">Admin Page</a></li>
          <li><a href="#">Go to Website</a></li>
          <li><a href="#">Order</a></li>
        </ul>
      </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Add content
    </button>
        </div>
        <form action="search.php" method="get" class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search by ID_content" aria-label="Search" name="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Id_categories</th>
                        <th>Description</th>
                        <th>function</th> 
                    </tr>
                </thead>
                <tbody>
                  <?php
                  require_once "../connect.php";
                  $hienthi_sql="SELECT*FROM  categories inner join contents on contents.id_categories= .categories.id_categories";
                  $result = mysqli_query($conn, $hienthi_sql);
                   while($row= mysqli_fetch_assoc($result)){?>
                    <tr>
                        <td><?php echo $row['id_contents'];  ?></td>
                        <td><?= $row['id_categories']; ?></td>
                        <td><?= $row['description']; ?></td>
                        <td>
                        <a href="edit.php?id=<?php echo $row['id_contents']; ?>" class="btn btn-success"> sửa</a>
                            <a onclick="return confirm ('bạn có muốn xóa content này không');"
                              href="delete.php?id=<?php echo $row['id_contents']; ?>" class="btn btn-danger">xóa
                        </td> 
                    </tr> 
                    <?php }?>
                </tbody>
            </table>
        </div>
        <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Form add content</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form action="add.php" method="post">
        <div class="form-group">
                <label for="id_categories"></label>id_categories<input type="text" id="id_categories" class="form-control" name="id_categories"></div>
            <div class="form-group">
                <label for="description"></label>description<input type="text" id="description" class="form-control" name="description"></div>
          <button class="btn btn-success">Add content</button>
        </form>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</body>
</html>