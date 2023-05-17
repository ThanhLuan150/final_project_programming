<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/Themgiohang.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<?php include './header.php' ?>

<body>
    <div class="body">
        <div class="container">
            <br><br>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label class="checkboxgiohang">
                            Delete
                        </label>
                    </div>
                    <div class="col-4 rowgionameproducts">
                        Sản phẩm
                    </div>
                    <div class="col-1 rowgiosizeproducts">
                        Size
                    </div>
                    <div class="col-1 rowgiopriceproducts">
                        Giá
                    </div>
                    <div class="col-1 rowgiotrangthaiproducts">
                        Trạng thái
                    </div>
                    <div class="col-1 rowgioquantityproducts">
                        Số lượng
                    </div>
                    <div class="col-2 rowgiopricecocs">
                        Tiền cọc
                    </div>
                    <div class="col-1 rowgiototalprices">
                        Tổng tiền
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="container-fluid">
                <?php if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) { ?>
                        <div class="row">
                            <div class="col-auto">
                                <label class="checkboxgiohang">
                                    <a href="../controllers/cart.controller.php?xoa=<?php echo $key ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </a>
                                    <!-- <input class="checkboxall" type="checkbox" value="<?php echo $key ?>"> -->
                                </label>
                            </div>
                            <div class="col-4 rowgionameproduct">
                                <div class="rowimgproduct">
                                    <img class="anhproduct" src="<?php echo $value['image'] ?>" alt="">
                                </div>
                                <div class="nameproduct">
                                    <?php echo $value['name_clothes'] ?>
                                </div>
                            </div>
                            <div class="col-1 rowgiosizeproduct">
                                L
                            </div>
                            <div class="col-1 rowgiopriceproduct">
                                <?php echo $value['rent_prices'] ?>
                            </div>
                            <div class="col-1 rowgiotrangthaiproduct">
                                Tốt
                            </div>
                            <div class="col-1 rowgioquantityproduct">
                                <?php echo $value['quantity'] ?>
                                <a href="../controllers/cart.controller.php?id=<?php echo $key ?>"><button style="
                                color: black;
                                border: none;
                                height: 20px;
                                width: 20px;
                                background-color: #fff;
                                margin-left: 5px;
                                margin-top: -15px;
                                font-size: 30px;">+</button></a>
                                <?php
                                if ($value['quantity'] <= 0) {
                                ?>
                                    <a href="../controllers/cart.controller.php?giamquantity=<?php echo $key ?>" disabled><button style="
                                color: black;
                                border: none;
                                height: 20px;
                                width: 20px;
                                background-color: #fff;
                                margin-left: 5px;
                                margin-top: -15px;
                                font-size: 30px;">-</button></a>
                                <?php
                                } else { ?>

                                    <a href="../controllers/cart.controller.php?giamquantity=<?php echo $key ?>"><button style="
                                color: black;
                                border: none;
                                height: 20px;
                                width: 20px;
                                background-color: #fff;
                                margin-left: 5px;
                                margin-top: -15px;
                                font-size: 30px;">-</button></a>
                                <?php } ?>
                            </div>
                            <div class="col-2 rowgiopricecoc">
                                <?php echo $value['tiencoc'] ?>
                            </div>
                            <div class="col-1 rowgiototalprice">
                                <?php echo $value['total'] ?>
                            </div>
                        </div>
                <?php }
                } ?>
                <div class="row">
                    <div class="col-auto">
                        <label class="checkboxgiohang">
                            <input class="checkboxall" type="hidden">
                        </label>
                    </div>
                    <div class="col-7 totalproducts">
                        Tổng sản phẩm: <?php echo $_SESSION['total_quantity'] ?>
                    </div>
                    <div class="col-2 totalprices">
                        Tổng tiền: <?php echo  $_SESSION['total_cart'] ?>
                    </div>
                    <div class="col-2 thanhtoanall">
                        <a href="../controllers/thanhtoan.controller.php"><button class="thanhtoan">Thanh toán</button></a>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="container">
                <h2 class="backgroundp1">Xem thêm sản phẩm</h2>
                <?php
                include('../connect/connect.dp.php');

                $sql = "SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories and id_clothes ORDER BY RAND();";
                // câu truy vấn này dùng để
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                ?>
                    <div class="list_schools">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <div class="item">
                                <div class="image11">
                                    <img class="img4" src="<?php echo $row["image"]; ?>" alt="">
                                </div>
                                <br>
                                <div class="informationproduct">
                                    <p class="informationproductp1"><?php echo $row["name_clothes"]; ?></p>
                                    <p class="informationproductp2"><?php echo $row["rent_prices"]; ?></p>
                                    <p class="informationproductp2"><?php echo $row["sex"]; ?></p>
                                    <div class="button111">
                                        <button class="bt2"><a class="a1" href="Chitietsanpham.view.php">Details</a></button>
                                        <button class="bt2"><a class="a1" href="../controllers/cart.controller.php?id=<?php echo $row["id_clothes"]; ?>">Đặt thuê</a></button>
                                        <a href="../controllers/cart.controller.php?id=<?php echo $row["id_clothes"]; ?>"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                    <?php  }
                    } else {
                        echo "Không có kết quả để hiển thị ra";
                    }
                    $conn->close();
                    ?>

                    </div>
            </div>
        </div>

        <?php
        include('./footer.php')
        ?>
</body>

</html>