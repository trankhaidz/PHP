<?php
require_once 'function.php';
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js"></script>
    <script src="../Public/JS/navbar.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Notable&family=Racing+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Public/CSS/call.css">
    <link rel="stylesheet" href="../Public/CSS/index3.css">
    <title>ABCmobile - Điện thoại chính hãng, giá tốt nhất</title>
</head>
<body>
<div class="row headers">
    <div class="container">
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-hand-holding-usd"></i><a href="Trangchu.php"> Cam kết giá tốt nhất</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-truck-moving"></i><a href="freeship.php">Miễn phí vận chuyển</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-map-marked-alt"></i><a href="Trangchu.php">Thanh toán khi nhận hàng</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-shield-alt"></i><a href="change_delivery.php">Đổi trả trong 7 ngày</a></span>
        <!--        <span class="topp"><a href="#">Bảo hành tận nơi</a></span>-->
    </div>
</div>
<!-- Header -->
<div class="row header">
    <div class="topnav" id="myTopnav">
        <a href="Trangchu.php" class="logo">
            <span class="logo1">A</span>
            <span class="logo2">BCmobile</span></a>
        <a href="Trangchu.php">Trang Chủ</a>
        <a href="introduce.php">Giới Thiệu</a>
        <a href="tel: 0963543864">Liên Hệ</a>

        <a href="javascript:void(0);"
           style="font-size:19px;"
           class="icon" onclick="myFunction()">&#9776;</a>

        <?php
        if (isset($_SESSION['account']) or isset($_SESSION['avatar']))
        {
            $prfuser = prf_user($_SESSION['id_kh']);
            $prf = mysqli_fetch_array($prfuser);
            $anhdd = $prf['avatar'];
            echo "<a class='regis_log' href='profile_user.php'>
                  <img src='../Images/$anhdd' alt=''>"."
                  <font style='color: bisque'>".$_SESSION['account']."</font></a>";
        }else
        {
            ?>
            <a href="register.php" class="regis_log"><span class="fa fa-user-plus"></span> Đăng Ký</a>
            <a class="regis_log" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
        <?php } ?>
        <a href="cart.php" class="regis_log">
            <i class="fa fa-cart-plus"></i>
        </a>
        <div class="search">
            <form action="result_search.php" method="post" class="form-inline">
                <input type="text" name="text_search" id="search" class="form-control text-search" placeholder="Tìm kiếm...">
                <input type="submit" value="Tìm kiếm" name="search" class="btn btn-warning">
            </form>
        </div>
    </div>
    <div class="row result-search">
        <div class="list-group col-md-5 col-md-offset-4" id="show-list">
            <!--            <a href="#" class="list-group-item border-1">List 1</a>-->
        </div>
    </div>
</div>

<!--  Body  -->
<div class="container pay">
    <div class="row">
        <h3 class="text-center"><b>QUY ĐỊNH VỀ VIỆC SAO LƯU DỮ LIỆU</b></h3>
        <h3 class="text-center">tại hệ thống cửa hàng <b>ABCmobile</b></h3>
        <hr>
        <div class="container pay-text">
            <img src="../Images/photo6152001534796343438.jpg" alt="">
        </div>
        <h4><b>Để việc tiếp nhận sản phẩm được nhanh và tốt hơn, Quý khách hàng vui lòng lưu ý quy định sau:</b></h4>
        <ul>
            <li>Gỡ bỏ hoặc Cung cấp mật khẩu màn hình.</li>
            <li>Thoát tất cả tài khoản bảo mật cá nhân như: Apple iCloud, Samsung Account, MiCloud, Google, .v.v…</li>
            <li>Vui lòng chủ động tự sao lưu dữ liệu trước khi gửi máy.
                (Hướng dẫn chi tiết với Android | Hướng dẫn chi tiết với iOS)</li>
            <li>Khách hàng cần sao lưu dữ liệu khi tiếp nhận, kỹ thuật viên hỗ trợ lưu giữ danh bạ,
                hình ảnh và video; không sao lưu ứng dụng và dữ liệu trên ứng dụng. Thời gian
                lưu trữ dữ liệu tại cửa hàng: 20 ngày kể từ ngày tiếp nhận sản phẩm.</li>
        </ul>
        <p>
            Chúng tôi hoàn toàn ý thức được tầm quan trọng của dữ liệu của khách hàng và
            luôn cố gắng hết sức để <b class="text-danger">hỗ trợ - hướng dẫn</b> khách hàng trong
            việc sao lưu dữ liệu. Tuy nhiên, cửa hàng <b class="text-danger">không chịu trách nhiệm về việc
            mất bất cứ dữ liệu</b> trong mọi trường hợp.
        </p>
        <p>Kính mong nhận được sự thấu hiểu và hợp tác từ phía khách hàng.</p>
    </div>
</div>

<!----------------Back To Top------------------->

<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="fas fa-chevron-circle-up"></span>
</div>
<!------------Call----------------->
<a id="calltrap-btn" class="b-calltrap-btn calltrap_offline hidden-phone visible-tablet"
   href="tel:0967448690" data-toggle="tooltip" title="Gọi ngay cho tôi" data-placement="right">
    <div id="calltrap-ico"></div>
</a>
<!-------------------Inbox------------------------->
<div class="float-ck">
    <div id="hide_float_right">

        <a href="javascript:hide_float_right()">
            <i class="fa fa-comment-alt"></i> Chat với nhân viên tư vấn !
            <span><i class="fas fa-minus"></i></span>
        </a>

    </div>
    <div id="float_content_right">
        <!– Start quang cao–>
        <div class="kh-ib">
            <br>
            <p><b>Nhập thông tin của bạn *</b></p>
            <form method="post">
                <p><input type="text" class="form-control" name="ten_ib" id="" placeholder="Nhập họ và tên của bạn"></p>
                <p><input type="text" class="form-control" name="email_ibb" id="" placeholder="Nhập email của bạn"></p>
                <p><input type="tel" class="form-control" name="sdt_ib" id="" placeholder="Nhập số điện thoại của bạn"></p>
                <b>Tin nhắn *</b>
                <textarea name="tin_ib" class="form-control" cols="30" rows="7" placeholder="Nội dung tin nhắn"></textarea>
                <hr>
                <button type="submit" class="btn btn-danger" name="send_ib">Gửi tin nhắn</button>
            </form>
        </div>

        <!– End quang cao –>

    </div>
</div>

<!-------------Footer------------->
<div class="row footer">
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>VỀ ABCmobile</b> <br>
        <a href="introduce.php">Giới thiệu về ABCmobile</a> <br>
        <a href="pay.php">Thanh toán</a> <br>
        <a href="customer_care.php">Chăm sóc khách hàng</a> <br>
        <a href="data_backup.php">Quy định về việc sao lưu dữ liệu</a> <br>
        <a href="endow.php">Ưu đãi từ đối tác</a> <br>
        <a href="business_cooperation.php">Liên hệ hợp tác cùng ABCmobile</a> <br>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6">
    <b>CHÍNH SÁCH & HỖ TRỢ</b> <br>
        <a href="online_shopping.php">Hỗ trợ mua hàng trực tuyến</a> <br>
        <a href="installment.php">Hướng dẫn mua trả góp</a> <br>
        <a href="freeship.php">Chính sách giao hàng</a> <br>
        <a href="information_security.php">Chính sách bảo mật thông tin</a> <br>
        <a href="warranty_policy.php">Chính sách bảo hành</a> <br>
        <a href="change_delivery.php">Chính sách đổi trả</a>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>THÔNG TIN LIÊN HỆ</b> <br>  
        <i class="fas fa-mobile-alt"></i>
        <span>Điện thoại: 0963543864 <a href="tel: "></a></span> <br>
        <i class="fas fa-phone-volume"></i>
        <span>Hotline: 0963543864 <a href="tel: "></a></span> <br>
        <i class="fas fa-envelope-open-text"></i>
        <span>Email: <a href="https://www.google.com/gmail">dinhhoanglong010@gmail.com</a></span>
    </div>
   
</div>
<div class="row follow">
    <div class="fot col-md-12 col-sm-12 col-xs-12 text-center">
        <h4><b>Theo dõi chúng tôi</b></h4>
        <a href=""><div class="fab fa-facebook"></div> <span>Facebook</span></a>
        <a href=""><div class="fab fa-instagram"></div> <span>Instagram</span></a>
        <a href=""><div class="fab fa-twitter"></div> <span>Twitter</span></a>
        <a href=""><div class="fab fa-youtube"></div> <span>Youtube</span></a>
    </div>
</div>
</body>
</html>
<script src="../Public/JS/carousel.js"></script>
<script src="../Public/JS/search.js"></script>
