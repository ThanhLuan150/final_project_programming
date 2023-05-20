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
  background-color: #B0E0E6CB;
}
table{
  width: 100%;
  border: 4px solid white;
  color: white;
}
h1{
  color:black;
}
h2{
  color:black;
}
.nav:hover{
    background-color: white;
}
#menu ul{
  list-style-type: none;
}
#menu a {
  text-decoration: none;
  color:black;
  font-size: 18px;
}
#menu ul.sub-menu {
  display: none;
  list-style-type: none;
  
}
#menu li:hover > ul.sub-menu {
  display: block;
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
<?php 
  require_once 'connect.php';
  $sql="SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories";
  $query=mysqli_query($conn,$sql);

?>
    <div class="logo">
          <img src="https://s120-ava-talk.zadn.vn/2/2/f/0/13/120/d6032707f2e221caa1043bae8f155dd5.jpg" alt="">
    </div>
    <h1> Admin page</h1>
    <div class="menu">
        <ul>
          <li><a href="#">Admin Page</a></li>
          <li><a href="#">Go to Website</a></li>
          <li><a href="#">Order</a></li>
        </ul>
      </div>
    <h2>Menu</h2>
    <div class="row">
    <div id="menu">
  <ul>
    <li >
      <a class="nav" href="#">Product management</a>
      <ul class="sub-menu">
        <li><a class="nav" href="./clothes/clothes.php">Clothes</a></li>
        <li><a class="nav" href="./categories/categories.php">Categories</a></li>
      </ul>
    </li>
    <li>
      <a class="nav" href="#">Post management</a>
      <ul class="sub-menu">
        <li><a class="nav"href="./blog/blog.php">Blog</a></li>
        <li><a class="nav"href="./contact/contact.php">Contact</a></li>
      </ul>
    </li>
    <li>
      <a class="nav" href="#">Information management</a>
      <ul class="sub-menu">
        <li><a class="nav"href="./content/content.php">Content</a></li>
        <li><a class="nav"href="./cccd/cccd.php">CCCD</a></li>
        <li><a class="nav"href="./user/user.php">User</a></li>
      </ul>
    </li>
  </ul>
</div>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Add clothes
    </button>
        </div>
        <form action="search.php" method="get" class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search by name_categories" aria-label="Search" name="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th> Giới tính </th>
                        <th>Tiền cọc</th>
                        <th>Loại sản phẩm </h>
                        <th>Thời gian tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Chức năng</th> 
                    </tr>
                </thead>
                <tbody>
                  <?php
                   $i=1;
                   while($row= mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?= $row['name_clothes']; ?></td>
                        <td><img style="width:100px;" src=<?php echo $row['image']; ?>></td>
                        <td><?php echo $row['rent_prices']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['tiencoc']; ?></td>
                        <td> <?= $row['name_categories'];?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['updated_at']; ?></td>  
                        <td>
                        <a href="edit.php?id=<?php echo $row['id_clothes']; ?>" class="btn btn-success"> sửa</a>
                        <a onclick="return confirm ('bạn có muốn xóa sinh viên này không');"
                              href="delete.php?id=<?php echo $row['id_clothes']; ?>" class="btn btn-danger">xóa</a>
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
          <h4 class="modal-title">Form add clothes</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form action="add.php" method="post">
        <div class="form-group">
                <label for="name_clothes"></label>name_clothes<input type="text" id="name_clothes" class="form-control" name="name_clothes"></div>
            <div class="form-group">
                <label for="image"></label>image<input type="text" id="image" class="form-control" name="image"></div>
                <div class="form-group">
                <label for="rent_prices"></label>rent_prices<input type="text" id="rent_prices" class="form-control" name="rent_prices"></div>
                <div class="form-group">
                <label for="sex"></label>sex<input type="text" id="sex" class="form-control" name="sex"></div>
                <div class="form-group">
                <label for="tiencoc"></label>tiencoc<input type="text" id="tiencoc" class="form-control" name="tiencoc"></div>
                <div class="form-group">
                <label for="name_categories"></label>name_categories<input type="text" id="name_categories" class="form-control" name="name_categories"></div>
                <div class="form-group">
                <label for="created_at"></label>created_at<input type="text" id="created_at" class="form-control" name="created_at"></div>
                <div class="form-group">
                <label for="updated_at"></label>updated_at<input type="text" id="updated_at" class="form-control" name="updated_at"></div>
          <button class="btn btn-success">Add clothes</button>
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