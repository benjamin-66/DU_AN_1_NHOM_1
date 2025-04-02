<?php
namespace App\Controllers\Admin;

use App\Views\Admin\Pages\Invoice\Index;
use App\Models\Invoice;
use App\Helpers\NotificationHelper;

use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;



class InvoiceController {
    public function index() {
        $invoiceModel = new Invoice();
        $invoices = $invoiceModel->getInvoices();

        Header::render();
        // hiển thị giao diện danh sách
        Index::render($invoices);
        Footer::render();
    }




}
?>
