<?php
include_once('admin/config/connect.php');
include_once('admin/config/pagination.php');
include_once('admin/config/price.php');
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Home</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/cart.css">
  <link rel="stylesheet" href="css/product.css">
  <link rel="stylesheet" href="css/category.css">
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/success.css">
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.js"></script>
  <style>
        .signup img {
            height: 18px;
            margin: 2px;
        }

        .signup a:hover span {
            opacity: 80%;
        }

        .signup a {
            text-decoration: none;
        }
        .signup span{
          color: white;
          margin-left: 5px;
        }
    </style>
</head>

<body>
<div style="background: #c0000b">

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <p class="text-white mb-0 ml-3">Dự án PHP | <a class="text-white" href="#">Tin khuyến mãi</a> | <a class="text-white" href="#">Tải ứng dụng</a></p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <?php
      if(isset($_SESSION['customer'])){
      $customer = $_SESSION['customer']['mail'];
      $sql_customer = "SELECT * FROM customer WHERE customer_mail = '$customer'";
      $query_customer = mysqli_query($conn, $sql_customer);
      $row_customer = mysqli_fetch_array($query_customer);
      ?>
      <div class="text-white text-right mr-3">Xin chào: <?php echo $row_customer['customer_name'] ?> | <a class="text-white" href="modules/customer/logout.php">Đăng xuất</a></div>
      <?php
      }else{
      
      ?>
       <div class="text-right mr-3 signup"><a href="modules/customer/login.php"><img src="images/avatar.png" alt=""><span>Đăng nhập</span></a></div>
      <?php } ?>
    </div>
</div>

</div>

  <!--	Header	-->
  <div id="header">
    <div class="container">
      <div class="row">
        <?php
        include_once('modules/logo/logo_top.php');
        include_once('modules/search/search_box.php');
        include_once('modules/cart/cart_notification.php');
        ?>
      </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <!--	End Header	-->

  <!--	Body	-->
  <div id="body">
    <div class="container">
      <?php
      include_once('modules/menu/menu.php');
      ?>
      <div class="row">
        <div id="main" class="col-lg-8 col-md-12 col-sm-12">
          <?php include_once('modules/slide/slide.php'); ?>

          <?php
          ////////////////////// Master Page
          if (isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
              case 'cart':
                include_once('modules/cart/cart.php');
                break;
              case 'category':
                include_once('modules/menu/category.php');
                break;
              case 'search':
                include_once('modules/search/search.php');
                break;
              case 'success':
                include_once('modules/cart/success.php');
                break;
              case 'product':
                include_once('modules/products/product.php');
                break;
            }
          } else {
            include_once('modules/products/featured.php');
            include_once('modules/products/latest.php');
          }
          ?>

        </div>
        <?php include_once('modules/banner/banner.php'); ?>
      </div>
    </div>
  </div>
  <!--	End Body	-->

  <div id="footer-top">
    <div class="container">
      <div class="row">
        <?php
        include_once('modules/logo/logo_footer.php');
        include_once('modules/address/address.php');
        include_once('modules/services/services.php');
        include_once('modules/hotline/hotline.php');
        ?>
      </div>
    </div>
  </div>
  <?php include_once('modules/footer/footer.php'); ?>
</body>

</html>