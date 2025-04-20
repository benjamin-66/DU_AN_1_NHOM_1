<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Pay\index;

class PayController
{
    public static function index()
    {
        if (isset($_SESSION['payment_success']) && $_SESSION['payment_success']) {
            echo '<div class="alert alert-success text-center">🎉 Đặt hàng thành công! Cảm ơn bạn đã mua hàng.</div>';
            unset($_SESSION['payment_success']); // xóa sau khi hiển thị
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render();
        Footer::render();
    }

    public static function store()
{
    session_start();

    // Kiểm tra giỏ hàng
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
        echo "Không có sản phẩm trong giỏ hàng!";
        return;
    }

    // Nhận dữ liệu từ form
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Tính tổng giá trị đơn hàng
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Lưu đơn hàng vào database
    $orderModel = new Order();
    $orderId = $orderModel->create([
        'name' => $name,
        'phone' => $phone,
        'payment_status' => 0, // mặc định chưa thanh toán
        'payment' => 0, // mặc định thanh toán trực tiếp
        'status' => 0, // chờ xử lý
        'user_id' => null // nếu chưa đăng nhập
    ]);

    if (!$orderId) {
        error_log("Lỗi khi tạo đơn hàng");
        return;
    }

    // Lưu sản phẩm trong giỏ hàng
    foreach ($_SESSION['cart'] as $item) {
        $orderDetailModel = new OrderDetail();
        if (!$orderDetailModel->create([
            'order_id' => $orderId,
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => $item['price']
        ])) {
            error_log("Lỗi khi lưu chi tiết đơn hàng");
        }
    }

    // Xóa giỏ hàng sau khi thanh toán thành công
    unset($_SESSION['cart']);

    // Trả về thông báo thanh toán thành công
    $_SESSION['payment_success'] = true;
    header('Location: /pay');
    exit;
}
    
}
