<?php

namespace App\Views\Client\Pages\Pay;


use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {


?>
        <style>
            td {
                white-space: nowrap;
                /* Ngăn chữ xuống dòng */
                overflow: hidden;
                /* Ẩn nội dung tràn */
                text-overflow: ellipsis;
                /* Hiển thị dấu 3 chấm */
                max-width: 300px;
                /* Đặt chiều rộng tối đa cho cột */
            }

            /* Form chính */
            #payment-form {
                display: none;
                /* Ẩn form mặc định */
                position: fixed;
                /* Hiển thị cố định */
                top: 50%;
                /* Căn giữa theo chiều dọc */
                left: 50%;
                /* Căn giữa theo chiều ngang */
                transform: translate(-50%, -50%);
                /* Đẩy form về chính giữa */
                z-index: 1000;
                /* Đưa form lên trên */
                background-color: #fff;
                /* Nền trắng */
                padding: 20px;
                /* Khoảng cách bên trong */
                border-radius: 10px;
                /* Bo góc form */
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
                /* Đổ bóng */
                max-width: 500px;
                /* Giới hạn chiều rộng */
                width: 100%;
                /* Đảm bảo form không quá nhỏ */
                animation: fadeIn 0.3s ease-in-out;
            }

            /* Hiệu ứng fade in */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            /* Header của form */
            .form-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid #ddd;
                margin-bottom: 15px;
                padding-bottom: 10px;
            }

            .form-header h1 {
                font-size: 18px;
                margin: 0;
                color: #333;
            }

            /* Nút đóng */
            .close-btn {
                background: none;
                border: none;
                font-size: 20px;
                cursor: pointer;
                color: #999;
                transition: color 0.3s;
            }

            .close-btn:hover {
                color: #333;
            }

            /* Nội dung form */
            .form-content {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .method {
                display: flex;
                align-items: center;
                gap: 10px;
                cursor: pointer;
                padding: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                transition: background-color 0.3s ease, transform 0.2s;
            }

            .method:hover {
                background-color: #f9f9f9;
                transform: scale(1.02);
            }

            .method img {
                max-width: 40px;
                max-height: 40px;
            }

            .method span {
                font-size: 16px;
                font-weight: bold;
                color: #555;
            }
        </style>

        <head>
            <meta charset="utf-8">
            <title>Fruitables - Vegetable Website Template</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="" name="keywords">
            <meta content="" name="description">

            <!-- Google Web Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

            <!-- Icon Font Stylesheet -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

            <!-- Libraries Stylesheet -->
            <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
            <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


            <!-- Customized Bootstrap Stylesheet -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <!-- Template Stylesheet -->
            <link href="css/style.css" rel="stylesheet">
        </head>

        <body>

        <section class="banner-area organic-breadcrumb">
                            <div class="container">
                                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                                    <div class="col-first">
                                        <h1>Shop</h1>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
            <!-- Trang Thanh Toán Bắt Đầu --><?php
// Kiểm tra xem có thông báo thanh toán thành công hay không

?>
            <div class="container-fluid py-5">
                <div class="container py-5">
                    <h1 class="mb-4">Thanh toán</h1>
                    <form action="/pay" method="POST">
    <div class="row g-5">
        <div class="col-md-12 col-lg-6 col-xl-7">
            <div class="form">
                <label class="form-label">Họ tên <sup>*</sup></label>
                <input type="text" name="name" class="form-control" placeholder="Họ tên" required>
            </div>
            <div class="form">
                <label class="form-label">Địa chỉ <sup>*</sup></label>
                <input type="text" name="address" class="form-control" placeholder="Số nhà, Tên đường" required>
            </div>
            <div class="form">
                <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
                <input type="tel" name="phone" class="form-control" required>
            </div>
            <div class="form">
                <label class="form-label my-3">Địa chỉ email<sup>*</sup></label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <hr>
            <div class="form-item">
                <textarea name="note" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Ghi chú đơn hàng (Tùy chọn)"></textarea>
            </div>
            <hr>
            <button type="submit" class="btn btn-danger">Thanh toán trực tiếp</button>
        </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-5">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $key => $item) {
                                                    $total += $item['price'] * $item['quantity'];
                                            ?>
                                                    <tr>
                                                        <td><?= $item['name'] ?></td>
                                                        <td><?= $item['quantity'] ?></td>
                                                        <td><?= number_format($item['price']) ?></td>
                                                        <td><?= number_format($item['price'] * $item['quantity']) ?></td>
                                                        <td>
                                                            <a href="/cart/remove/<?= $item['product_id'] ?>" class="btn btn-danger">Xóa</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="6" scope="col">Tổng tiền</td>
                                                <td><?= number_format($total) ?> Vnd</td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <!-- JavaScript Libraries -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/lightbox/js/lightbox.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>



        </body>

        </html>

<?php
    }
}
