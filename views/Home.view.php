<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/Home.css">
    <link rel="stylesheet" href="../Reponsive/Reponsivehome.css">
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
</head>

<body>
    <?php
    include '../views/header.php';
    if (isset($_SESSION["order_success"]) && $_SESSION["order_success"] === true) {
        echo '    <script>
        Swal.fire(
          "thank you your order!",
          "We will contact you as soon as possible!",
          "You clicked the button!",
          "success");
        
      </script>';
        unset($_SESSION["order_success"]); // Xóa biến session sau khi hiển thị thông báo
    }
    ?>
    <div class="poster">
        <div class="mySlides fade">
            <img class="img1" src="../img/poster.jpg" alt="" style="width:100%">
            <div class="text">Nội dung caption của slide đầu tiên!</div>
        </div>
        <div class="mySlides fade">
            <img class="img1" src="../img/poster.jpg" alt="" style="width:100%">
            <div class="text">Nội dung caption của slide thứ 2!</div>
        </div>
        <div class="mySlides fade">
            <img class="img1" src="../img/poster.jpg" alt="" style="width:100%">
            <div class="text">Nội dung caption của slide thứ 3!</div>
        </div>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(0)"></span>
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
    </div>
    <script>
        //khai báo biến slideIndex đại diện cho slide hiện tại
var slideIndex;
// KHai bào hàm hiển thị slide
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex].style.display = "block";  
    dots[slideIndex].className += " active";
    //chuyển đến slide tiếp theo
    slideIndex++;
    //nếu đang ở slide cuối cùng thì chuyển về slide đầu
    if (slideIndex > slides.length - 1) {
      slideIndex = 0
    }    
    //tự động chuyển đổi slide sau 5s
    setTimeout(showSlides, 5000);
}
//mặc định hiển thị slide đầu tiên 
showSlides(slideIndex = 0);


function currentSlide(n) {
  showSlides(slideIndex = n);
}
    </script>
    <div class="body" style="background-image: url(../page/img/nen.jpg); ">
        <div class="introduce">
            <div class="container">
                <p class="introducep1">Giới thiệu</p>
                <p class="introductp2">ÁO CỔ PHỤC TTDVL KINH THÀNH HUẾ DỊCH VỤ THUÊ ÁO GIÁ RẺ CHẤT LƯỢNG</p>
                <p class="inteoductp3">Giúp cho vẻ đẹp của bạn muôn phần đẹp hơn</p>
                <div class="introductcontent">
                    <div class="content1">
                        <p class="introductcontentp">Bạn hãy chọn cho mình những bộ cổ phục đẹp nhất, độc đáo nhất với giá thành hợp lý nhất và có những bức ảnh đẹp tôn lên vẻ đẹp dân tộc , cổ kỉnh , uy nguy bằng cách trao cho áo cổ phục TTDVL cơ hội thực hiện mong muốn của bạn!</p>
                        <p class="introductcontentp">Vài năm trở lại đây, ngày càng có nhiều bạn trẻ quan tâm đến văn hóa truyền thống như lịch sử triều đại, nghi lễ thưởng trà theo cung đình xưa, ý nghĩa của các biểu tượng văn hóa cổ…, khoát lên mình bộ cổ phục uy nguy , tráng lệ tôn vinh thêm vẻ đẹp của cổ kính của bộ đồ.</p>
                        <p class="introductcontentp">Áo cổ phục là một nét đẹp văn hóa truyền thống, lịch sử triều đại, nghi lễ thưởng trà theo cung đình xưa, ý nghĩa của các biểu tượng văn hóa cổ. Thường suất hiện trong hoàng cung, dân ta thường sử dụng áo cổ phục làm trang phục chính để thực hiện các nghi lễ quan trọng.</p>
                        <div class="icon">
                            <a class="a" href="https://www.facebook.com/lethanhluan150503"> <i class="fa-brands fa-facebook"></i></a>
                            <a class="a" href="https://www.youtube.com/channel/UCpR0Jjt_57gDN91Qf9UAA8w"><i class="fa-brands fa-youtube"></i></a>
                            <a class="a" href="https://www.instagram.com/lu_an8934/"><i class="fa-brands fa-instagram"></i></a>
                            <a class="a" href="https://www.youtube.com/channel/UCpR0Jjt_57gDN91Qf9UAA8w"><i class="fa-brands fa-twitter"></i></a>
                            <a class="a" href="https://www.youtube.com/channel/UCpR0Jjt_57gDN91Qf9UAA8w"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                    <img class="img2" src="../img/content.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="inforproduct">
        <div class="container">
            <p class="inforproductp">Dịch Vụ Chính Cổ Phục TTDVL</p>
            <p class="inforproductp1">Địa điểm cho thuê - Bán cổ phục các loại giá rẻ - Uy tín - Chất lượng</p>
            <center>
                <img class="img3" src="../img/thongtin.jpg" alt="">
            </center>
        </div>
    </div>
    <div class="background">
        <div class="container">
            <br>
            <form method="GET" action="../controllers/locsanpham.controller.php">
                <select class="input" name="id_categories" id="categories">
                    <?php
                    include_once('../Models/locsanpham.model.php');
                    // Hiển thị danh sách các danh mục trong dropdown list
                    $rows = find_items();
                    if (is_array($rows) && count($rows) > 0) {
                        foreach ($rows as $row) {
                            echo '<option value="' . $row['id_categories'] . '">' . $row['name_categories'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <button class="button" type="submit">Lọc</button>
            </form>
            <br> <br>
            <?php
            include_once('../Models/allitems.model.php');
            // Hiển thị danh sách các danh mục trong dropdown list
            $rows = allitems();
            if (is_array($rows) && count($rows) > 0) {
                // output data of each row
            ?>
                <div class="list_schools">
                    <?php foreach ($rows as $row) { ?>
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
                                    <button class="bt2"><a class="a1" href="../controllers/chitietsanpham.controller.php?id=<?php echo $row["id_clothes"]; ?>">Details</a></button>
                                    <button class="bt2"><a class="a1" href="../controllers/cart.controller.php?id=<?php echo $row["id_clothes"]; ?>">Đặt thuê</a></button>
                                    <a href="../controllers/cart.controller.php?id=<?php echo $row["id_clothes"]; ?>"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                <?php  }
                } else {
                    echo "Không có kết quả để hiển thị ra";
                }
                ?>
                </div>
        </div>
    </div>
    </div>
    <?php
    include '../views/footer.php';
    ?>
</body>

</html>