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
 
    public function getOneProductByName($name)
    {
        return $this->getOneByname($name);
    }
    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            //$sql = "SELECT * FROM $this->table";
            $sql = "SELECT products.*,categories.name AS category_name
             FROM products 
             INNER JOIN categories 
             ON products.category_id=categories.id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return $result;
        }
    }

}
