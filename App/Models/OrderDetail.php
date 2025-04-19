<?php

namespace App\Models;

class OrderDetail extends BaseModel
{
    protected $table = 'order_details';
    protected $id = 'id';

    public function getAllDetails()
    {
        return $this->getAll();
    }
    public function createOrderDetail($data)
    {
        return $this->create($data);
    }
    public function getDetailsByOrderId($orderId)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE order_id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $orderId);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log("Lỗi getDetailsByOrderId: " . $th->getMessage());
            return [];
        }
    }

    public function createDetail($data)
    {
        return $this->create($data);
    }

    public function deleteDetail($id)
    {
        return $this->delete($id);
    }
}
