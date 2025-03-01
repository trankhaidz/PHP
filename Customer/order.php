<?php
require_once ("function.php");
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
           
            <span class="logo2">ABCmobile</span></a>
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
<div class="container">
    <div class="row profile">
        <div class="col-md-4 profile-content">
            <div>
                <?php $prfuser = prf_user($_SESSION['id_kh']);
                $prf = mysqli_fetch_array($prfuser);
                $anhdd = $prf['avatar']; echo "<img src='../Images/$anhdd'
                    alt=''>"."<b>".$_SESSION['account']."</b>"; ?>
            </div>
            <div class="prf-text">
                <input class="prf-user" id="prf-user" type="checkbox" >
                <label for="prf-user"><i class="fa fa-user-circle"></i> Tài khoản của tôi</label>
                <div class="prf-user-file">
                    <a href="profile_user.php">Hồ sơ của tôi</a> <br>
                    <a href="change_password.php">Đổi mật khẩu</a>
                </div>
            </div>
            <div class="prf-text">
                <a href="like_product.php">
                    <i class=" fa fa-heart"></i> Yêu thích
                </a>
            </div>
            <div class="prf-text">
                <a href="order.php">
                    <i class="fa fa-newspaper"></i> Đơn đặt hàng
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <table width="100%" style="background: #fff">
                <tr style="    border-bottom: 3px solid red;">
                    <td><h3>Tất cả đơn hàng đã đặt</h3></td>
                    <td align="right"><h4><a href='logout.php' class='glyphicon glyphicon-log-out'>ĐăngXuất</a></h4></td>
                </tr>
            </table>
            <hr>

                <div style="margin-bottom: 36px;">

                        <?php
                            $ds_dh = view_order($_SESSION['id_kh']);
                            if (mysqli_num_rows($ds_dh) != 0)
                            {
                                while ($dh = mysqli_fetch_array($ds_dh))
                                {
                        ?>
                    <table class="table" style="background: #fff">
                                    <tr>
                                        <td colspan="4" class="text-right">ID ĐƠN HÀNG: <?php echo $dh['id_ddh'];?></td>
                                    </tr>

                                        <?php
                                            $tontien = 0;
                                            $ct_ddh = view_order_details($dh['id_ddh']);
                                            while ($ct = mysqli_fetch_array($ct_ddh))
                                            {
                                        ?>
                                              <tr>

                                                <td><img src="../Images/<?php echo $ct['anh_sp']; ?>" style="width: 50px; height: 50px" alt=""></td>
                                                <td colspan="2">
                                                    <font style="font-size: 16px;"><?php echo $ct['ten_sp']; ?> </font><br>
                                                    <font style="font-size: 13px; color: rgba(0,0,0,.54);">Phân loại hàng: <?php echo $ct['mau_sac']; ?></font> <br>
                                                    <font style="font-size: 13px;">x <?php echo $ct['slspb']; ?></font>
                                                </td>
                                                <td class="text-right">
                                                    <strike><?php echo number_format($ct['gia_sp'],0,',','.'); ?>&nbsp;đ</strike> <br>
                                                    <font style="color: red"><?php echo number_format($ct['don_gia'],0,',','.'); ?>&nbsp;đ</font>
                                                </td>
                                              </tr>
                                        <?php
                                            }
                                        ?>
                                    <tr style="background-color: #fffcf5;">
                                        <td colspan="4" class="text-right">
                                            <i class="fas fa-dollar-sign" style="color: red"></i> Tổng số tiền:
                                            <font style="font-size: 20px;color: red;">
                                                <?php echo number_format($dh['tong_tien'],0,',','.'); ?>
                                            </font>
                                        </td>
                                    </tr>
                                    <tr style="background-color: #fffcf5;">
                                        <td colspan="3" style="border: none;color: rgba(0,0,0,.54);">Đơn hàng được đặt lúc <?php echo $dh['ngay_lap']; ?></td>
                                        <td class="text-right" style="border: none;">
                                            <a href="order_details.php?idctdh=<?php echo $dh['id_ddh'];?>" class="btn btn-default" role="button">Xem chi tiết đơn hàng</a>
                                            <a href="delete_order.php?idddh=<?php echo $dh['id_ddh'];?>"
                                               onClick ="if(confirm('Bạn chắc chắn muốn hủy đơn hàng này ?'))
                               return true; else return false;" class="btn btn-default" role="button">Hủy đơn hàng</a>
                                        </td>
                                    </tr>
                    </table>
                        <?php        }
                            }else{
                         ?>
                                <div style="padding-bottom: 153px;">
                                    <h3 class="text-center" style="padding-top: 40px; padding-bottom: 40px;">
                                        Bạn chưa có đơn hàng nào !
                                    </h3>
                                    <a href="Trangchu.php">
                                        Lựa chọn thêm sản phẩm tại đây !
                                    </a>
                                </div>

                        <?php
                            }
                        ?>

                </div>

        </div>
    </div>
</div>
<!----------------Back To Top------------------->
<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="fas fa-chevron-circle-up"></span>
</div>
<!------------Call----------------->
<a id="calltrap-btn" class="b-calltrap-btn calltrap_offline hidden-phone visible-tablet"
   href="tel:0963543864" data-toggle="tooltip" title="Gọi ngay cho tôi" data-placement="right">
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
        <b>VỀ STORE</b> <br>
        <a href="introduce.php">Giới thiệu về Store</a> <br>
        <a href="pay.php">Thanh toán</a> <br>
        <a href="customer_care.php">Chăm sóc khách hàng</a> <br>
        <a href="data_backup.php">Quy định về việc sao lưu dữ liệu</a> <br>
        <a href="endow.php">Ưu đãi từ đối tác</a> <br>
        <a href="business_cooperation.php">Liên hệ hợp tác cùng Store</a> <br>
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
        <span>Email: <a href="https://www.google.com/gmail">buitrongdat0904@gmail.com</a></span>
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
