<?php
namespace App\Models;

class Invoice extends BaseModel {
    protected $table = 'invoices';
    protected $id = 'id';

    public function getInvoices() {
        return $this->getAll();
    }


    public function insertInvoice($data) {
        return $this->insert($data);
    }
}



?>
