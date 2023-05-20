<?php include_once '../connect/connect.dp.php';
if (!isset($_SESSION)) {
  session_start();
}
include '../views/header.view.php';

// $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

?>



<div class="container">
  <div class="row">
    <div class="col-md-7">
      <form method="POST" action="../controllers/thanhtoan.controller.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Full name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $_SESSION['user']['username'] ?>">

        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $_SESSION['user']['email'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Phone</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Address</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="address">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Note</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="note" >
        </div>
        <div class="form-group" style="color: red;">
         Lưu ý: Thanh toán khi nhận hàng!
        </div>
        <button type="submit" name="btn" class="btn btn-info" >Đặt hàng</button> </h3><br>
      </form>
    </div>
    <div class="col-md-5">
      <div class="panel panel-info">
        <div class="panel-body">
          <h4>Thông Tin đơn hàng</h4>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>

                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>đơn giá </th>
                <th>tiền cọc </th>
                <th>Thành Tiền </th>
              </tr>
            </thead>
            <tbody>
              <?php $total_price = 0; ?>
              <?php
              if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                  // $total_price += (($value['rent_prices']+ $value['tiencoc']) * $value['quantity'] )
              ?>
                  <tr>
                    <td><?php echo $value['name_clothes'] ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo number_format($value['rent_prices']) ?></td>
                    <td><?php echo number_format($value['tiencoc']) ?></td>
                    <?php
                    if ($value['quantity'] >= 1) { ?>
                      <td><?php echo number_format($value['total']) ?></td>
                    <?php } ?>


                    </td>


                  </tr>
              <?php }
              } ?>
              <tr>
                <td> Tổng Tiền </td>
                <td colspan="6" class="text-center bg-primary">
                  <?php

                  echo number_format($_SESSION['total_cart']);
                  ?>
                  VNĐ</td>


              </tr>



            </tbody>
          </table>

        </div>
      </div>
      <div class="panel panel-white">
        <div class="panel-heading">

          <div>
          </div>
        </div>

      </div>

      <div class="panel-body deess">

      </div>

    </div>
  </div>
</div>



<!--  -->

<?php include '../views/footer.view.php' ?>;