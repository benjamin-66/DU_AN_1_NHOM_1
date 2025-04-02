<?php

namespace App\Views\Admin\Pages\invoice;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">QUẢN LÝ Danh Sách Hóa Đơn </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách Hóa Đơn </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách Hóa Đơn </h5>
                        <?php
                                if (count($data)) :
                                ?>
                        <div class="table-responsive">
                            <table id="" class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Số Tiền</th>
                                        <th>Trạng Thái</th>
                                        <th>Ngày Tạo</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php foreach ($data as $invoice) : ?>
        <tr>
            <td><?= $invoice['id'] ?></td>
            <td><?= $invoice['order_id'] ?></td>
            <td><?= number_format($invoice['total_amount'], 2) ?> VNĐ</td>
            <td><?= ($invoice['status'] == 'paid') ? 'Đã thanh toán' : 'Chưa thanh toán' ?></td>
            <td><?= ($invoice['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
            <td><?= $invoice['created_at'] ?></td>
            <td>
                <a href="/admin/invoicies/<?= $invoice['id'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                <form action="/admin/categories/<?= $invoice['id'] ?>" method="post"
                    style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
                    <input type="hidden" name="method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
                            </table>
                        </div>
                        <?php
                                else :

                                ?>
                        <h4 class="text-center text-danger">Không có dữ liệu</h4>
                        <?php
                                endif;

                                ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


    <?php
    }
}