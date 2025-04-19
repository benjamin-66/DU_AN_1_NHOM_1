<?php

namespace App\Models;

use PDO;

class Pay extends BaseModel
{
    protected $table = 'payments'; // Bảng này sẽ lưu thông tin thanh toán
    protected $id = 'id';
    protected $db;

    // Khởi tạo đối tượng PDO để kết nối cơ sở dữ liệu
    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    // Lưu thông tin thanh toán
    public function createPayment($orderId, $userId, $amount, $status)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO payments (order_id, user_id, amount, status, created_at) VALUES (?, ?, ?, ?, NOW())");
            $stmt->execute([$orderId, $userId, $amount, $status]);
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            error_log('Error creating payment: ' . $e->getMessage());
            return false;
        }
    }

    // Lấy thông tin thanh toán theo order_id
    public function getPaymentByOrderId($orderId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM payments WHERE order_id=?");
            $stmt->execute([$orderId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log('Error fetching payment info: ' . $e->getMessage());
            return [];
        }
    }

    // Cập nhật trạng thái thanh toán
    public function updatePaymentStatus($paymentId, $status)
    {
        try {
            $stmt = $this->db->prepare("UPDATE payments SET status=? WHERE id=?");
            $stmt->execute([$status, $paymentId]);
            return true;
        } catch (\Exception $e) {
            error_log('Error updating payment status: ' . $e->getMessage());
            return false;
        }
    }
}
