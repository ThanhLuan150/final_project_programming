<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../Reponsive/Reponsiveheader.css">
    <link rel="stylesheet" href="/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <script src="/bootstrap-5.2.2-dist/js/jquery.min.js"></script>
    <script src="/bootstrap-5.2.2-dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<script>
    var menuToggle = document.getElementById('menu-toggle');
    var menu = document.getElementById('menu');

    menuToggle.addEventListener('click', function() {
      menu.classList.toggle('show');
    });
  </script>
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>
    <div class="header">
        
        <div class="image">
            <a href="../views/Home.view.php"><img class="img" src="../img/logo.jpg" alt=""></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="../views/Banggiaphucvu.view.php">BẢNG GIÁ PHỤC VỤ</a></li>
                <li><a href="../views/Aodoikham.view.php">ÁO ĐỐI KHÂM</a></li>
                <li><a href="../views/Aogiaolinh.view.php">ÁO GIAO LĨNH</a></li>
                <li><a href="../views/Aonhatbinh.view.php">ÁO NHẬT BÌNH</a></li>
                <li><a href="../views/Aotac.view.php">ÁO TẮC</a></li>
                <li><a href="../views/Aonguthan.view.php">ÁO NGŨ THÂN</a></li>
                <li><a href="../views/Blog.view.php">BLOG</a></li>
                <li><a href="../views/Lienhe.view.php">LIÊN HỆ</a></li>
            </ul>
        </div>
        <div class="function">
            <div class="functionsearch">
                <div class="search">
                    <i class="fa-sharp fa-solid fa-magnifying-glass" data-toggle="modal" data-target="#myModal"></i>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tìm kiếm</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="get" action="../controllers/timkiem.controller.php">
                                        <input class="input" type="text" name="search_query" placeholder="Nhập từ khóa tìm kiếm">
                                        <button class="button" type="submit" name="search">Tìm kiếm</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="button" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) {
            ?>
                <button class="button"><a href="../controllers/cart.controller.php?showcart=<?php echo $_SESSION['id_user'] ?>">Giỏ hàng <i class="fa-sharp fa-solid fa-cart-shopping"></i> </a></button>
                <button class="button"><a><?php echo $_SESSION['username'] ?></a></button>
                <button class="button"><a href="../views/Dangxuat.view.php">Đăng xuất</a></button>


            <?php } else {
            ?><button class="button"><a href="../views/Giohang.view.php">Giỏ hàng <i class="fa-sharp fa-solid fa-cart-shopping"></i> </a></button>
                <button class="button"><a href="../views/dangnhap.view.php">Đăng nhập</a></button>
                <button class="button"><a href="../views/dangky.view.php">Đăng ký</a></button>

            <?php } ?>



        </div>
    </div>
    </div>
</body>

</html>