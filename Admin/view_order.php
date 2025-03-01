<?php
require_once 'function.php';
session_start();
if (isset($_SESSION['account']))
{
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
    <link rel="stylesheet" href="../Public/CSS/index3.css">
    <link rel="stylesheet" href="../Public/CSS/admin.css">
    <title>ABCmobile - Điện thoại chính hãng, giá tốt nhất</title>
</head>

<body class="body-all-ad">
<!-- Header -->
<!-- Header -->
<div class="row header" style="margin: auto; width: 100%">
    <div class="topnav" id="myTopnav">
        <a href="Manager.php" class="logo">
            <span class="logo1"><i class="fas fa-users-cog"></i> A</span>
            <span class="logo2">dministrator</span></a>
        <a href="../Customer/Trangchu.php"><i class="fas fa-reply"></i> Vào trang web</a>
        <a href="../Customer/introduce.php">Giới Thiệu</a>
        <a href="tel: 0967448690">Liên Hệ</a>
        <a href="statistical.php">Thống kê</a>

        <a href="javascript:void(0);"
           style="font-size:19px;"
           class="icon" onclick="myFunction()">&#9776;</a>

        <?php
        if (isset($_SESSION['account']))
        {
            echo "<a class='regis_log' href='../Customer/profile_user.php'>
                  <img src='../Images/dat.jpg' alt='Bùi Trọng Đạt'>"."
                  <font style='color: bisque'>".$_SESSION['account']."</font></a>";
        }else
        {
            ?>
            <a href="../Customer/register.php" class="regis_log"><span class="fa fa-user-plus"></span> Đăng Ký</a>
            <a class="regis_log" href="../Customer/login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
        <?php } ?>
    </div>
</div>

<!--  Body  -->
<div class="row body_admin">
    <div class="col-md-3 left-admin" id="left-admin">
        <div class="home-admin">
            <a href="Manager.php">
                <i class="fas fa-house-damage"></i> Trang chủ Admin
            </a>
        </div>
        <div class="left-list">
            <input class="qtad" id="qtht" type="checkbox" >
            <label class="fa fa-user" for="qtht">Quản trị hệ thống</label>

            <div>
                <a href="account_management.php">Quản lý tài khoản</a>
            </div>
        </div>
        <div class="left-list">
            <input class="qtad" id="qtdm" type="checkbox" >
            <label class="fa fa-list" for="qtdm">Quản lý danh mục</label>
            <div>
                <a href="view_category.php">Danh mục sản phẩm</a> <br>
                <a href="view_product.php">Sản phẩm</a>
            </div>
        </div>
        <div class="left-list">
            <input class="qtad" id="qtnv" type="checkbox" >
            <label class="fa fa-coins" for="qtnv">Quản lý nghiệp vụ</label>
            <div>
                <a href="view_order.php">Quản lý đơn đặt hàng</a> <br>
                <a href="view_comment.php">Quản lý phản hồi</a>
            </div>
        </div>
    </div>
    <div class="col-md-9 right-admin" id="right-admin">
        <div class="row right-admin-top">
            <a href="../Customer/Trangchu.php">
                <i class="fas fa-home"></i> Trang chủ website
            </a>
            <span> > </span>
            <a href="view_order.php">Quản lý nghiệp vụ</a>
            <span> > </span>
            <a href="view_order.php">Quản lý đơn đặt hàng</a>
        </div>
        <div class="row right-admin-bottom">
            <div>
                <form method="post" class="search_ad">
                    <input type="search" name="search" placeholder="Tìm kiếm">
                    <button type="submit" class="btn btn-danger">Tìm kiếm</button>
                </form>
                <a href="add_category.php" class="add_new">
                    <button class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</button>
                </a>
            </div>
            <div class="table-responsive table_admin">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID Đơn hàng</th>
                        <th>Tên người đặt</th>
                        <th>Ngày lập</th> 
                        <th>Tổng tiền</th>
                        <th>Địa chỉ nhận hàng</th>
                        <th>Trạng thái</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stt = 1;
                    $list_ddh = ds_ddh();
                    while ($num=mysqli_fetch_array($list_ddh))
                    {   ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $num["id_ddh"]; ?></td>
                            <td><?php echo $num["ten_kh"]; ?></td>
                            <td><?php echo $num["ngay_lap"]; ?></td>
                            <td><?php echo $num["tong_tien"]; ?></td>
                            <td>
                                Người nhận: <b><?php echo $num["hoten_nn"]; ?></b> <br>
                                SĐT: <b><?php echo $num["sdt_nn"]; ?></b> <br>
                                Email: <b><?php echo $num["email_nn"]; ?></b> <br>
                                Nơi nhận: <b><?php echo $num["noi_nhan"]; ?></b> <br>
                                Ghi chú: <b><?php echo $num["ghi_chu"]; ?></b>
                            </td>
                            <td>
                                <form action="update_order_status.php" method="post">
                                    <input type="hidden" name="id_ddh" value="<?php echo $num['id_ddh']; ?>">
                                    <select name="trang_thai" onchange="this.form.submit()">
                                        <option value="Pending" <?php if($num['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                        <option value="Processing" <?php if($num['status'] == 'Processing') echo 'selected'; ?>>Processing</option>
                                        <option value="Shipped" <?php if($num['status'] == 'Shipped') echo 'selected'; ?>>Shipped</option>
                                        <option value="Delivered" <?php if($num['status'] == 'Delivered') echo 'selected'; ?>>Delivered</option>
                                        <option value="Cancelled" <?php if($num['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                                                        <td>

                            </td>
                            <td>
                                <a href="view_order_details.php?idorder=<?php echo $num['id_ddh']; ?>">
                                    <i class="fas fa-indent"></i></a>
                                <a href="delete_order.php?idorder=<?php echo $num['id_ddh']; ?>"
                                   onClick ="if(confirm('Bạn chắc chắn muốn xóa'))
                               return true; else return false;"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>

                        <?php $stt +=1;}  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--  Footer  -->
</body>
</html>
<?php }else{header('location: ../Customer/login.php');} ?>