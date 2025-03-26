<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'id';
    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }
    public function createProduct($data)
    {
        return $this->create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function getAllProductByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getOneProductByStatus($id)
    {
        return $this->getOneByStatus($id);
    }
    public function getOneProductByName($name)
    {
        return $this->getOneByName($name);
    }
    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            //$sql = "SELECT * FROM $this->table";
            $sql = "SELECT products.*,categories.name AS category_id FROM products INNER JOIN categories ON products.category_id=categories.id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllProductByCategoryAndStatus($id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name
            FROM products INNER JOIN categories ON products.category_id = categories.id 
            WHERE products.category_id=? AND products.status=" . self::STATUS_ENABLE .
                " AND categories.status=" . self::STATUS_ENABLE;
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllProductNew()
    {
        $result = [];
        try {
            $sql = "SELECT*FROM products WHERE products.is_feature=1";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllProductHot()
    {
        $result = [];
        try {
            $sql = "SELECT*FROM products WHERE products.is_feature=2";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return $result;
        }
    }
    public function getFilterProduct()
    {

        $result = [];
        try {
            if (isset($_GET['order'])) {
                // Lấy giá trị thứ tự từ form (asc hoặc desc)
                $order = $_GET['order'];

                // Sắp xếp mảng dựa trên giá trị người dùng chọn
                if ($order == 'asc') {
                    $sql = "SELECT * FROM products ORDER BY price asc"; // Sắp xếp tăng dần
                } elseif ($order == 'desc') {
                    $sql = "SELECT * FROM products ORDER BY price desc"; // Sắp xếp giảm dần
                }
            }

            // Câu truy vấn với sắp xếp động


            // $sql = "SELECT*FROM products ORDER BY price ASC";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return $result;
        }
    }
    public function getSeachProduct()
    {
        $result = [];
        try {
            if (isset($_GET['query']) && !empty($_GET['query'])) {
                $conn = $this->_conn->MySQLi();
                // var_dump($_GET['query']);
                $searchQuery = $conn->real_escape_string($_GET['query']); // Tránh SQL injection
                // var_dump($searchQuery);
                $sql = "SELECT*FROM products WHERE name LIKE '%$searchQuery%' ";
                // var_dump($sql);
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
               
            } 
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return $result;
        }

        // ------------

        // Truy vấn tìm kiếm
     
    }
}
