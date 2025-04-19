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
        $address  = $_POST['address'];
        $phone    = $_POST['phone'];
        $email    = $_POST['email'];
        $note     = $_POST['note'] ?? '';
    
        // Tính tổng giá trị đơn hàng
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    
        // Lưu đơn hàng vào database
        $orderModel = new Order();
        $orderId = $orderModel->create([
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'note' => $note,
            'total_price' => $total
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
    
        // Kiểm tra lại và chuyển hướng về trang thành công
        header('Location: /pay/success');
        exit;
    }
    
    public static function success()
    {
        Header::render();
        echo "<div style='text-align:center; padding: 40px'><h2>🎉 Thanh toán thành công!</h2><p>Cảm ơn bạn đã mua hàng.</p><a href='/' class='btn btn-primary mt-3'>Về trang chủ</a></div>";
        Footer::render();
        
    }
}
