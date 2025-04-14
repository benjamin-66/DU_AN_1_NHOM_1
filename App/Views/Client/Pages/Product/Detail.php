<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
?>

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Chi tiết sản phẩm</h1>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">
    <!-- Product detail -->
    <div class="row">
        <div class="col-md-6">
            <img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h3><?= $data['product']['name'] ?></h3>
            <p><?= $data['product']['description'] ?></p>

            <?php if ($data['product']['discount_price'] > 0) : ?>
                <p>
                    <span class="d-block text-muted">Giá gốc: <del><?= number_format($data['product']['price']) ?> đ</del></span>
                    <span class="d-block text-danger font-weight-bold">Giá giảm: <?= number_format($data['product']['price'] - $data['product']['discount_price']) ?> đ</span>
                </p>
            <?php else : ?>
                <p class="h5">Giá tiền: <?= number_format($data['product']['price']) ?> đ</p>
            <?php endif; ?>

			<p class="h5">Danh Mục : <?= $data['product']['category_name']?> đ</p>

            <form action="#" method="post">
                <input type="hidden" name="method" value="POST">
                <input type="hidden" name="id" value="<?= $data['product']['id'] ?>">
                <button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>

    <!-- Comments -->
    <div class="row mt-5">
        <div class="col-lg-10 offset-lg-1">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Bình luận</h5>
                </div>
                <div class="card-body">

                    <!-- List comments -->
                    <div class="mb-4">
                        <!-- Comment mẫu, nên lặp qua mảng nếu có dữ liệu -->
                        <div class="media mb-4">
                            <img src="<?= APP_URL ?>/public/uploads/users/user1.jpeg" class="mr-3 rounded-circle" alt="user" width="50">
                            <div class="media-body">
                                <h6 class="mt-0 font-weight-bold">Username</h6>
                                <p>Good product...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">2024-07-08 19:19:19</small>
                                    <div>
                                        <button class="btn btn-sm btn-outline-info" data-toggle="collapse" data-target="#editComment" aria-expanded="false">Sửa</button>
                                        <form action="#" method="post" class="d-inline-block" onsubmit="return confirm('Chắc chắn xoá?')">
                                            <input type="hidden" name="method" value="DELETE">
                                            <input type="hidden" name="product_id" value="">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Xoá</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="collapse mt-3" id="editComment">
                                    <form action="#" method="post">
                                        <input type="hidden" name="method" value="PUT">
                                        <input type="hidden" name="product_id" value="">
                                        <div class="form-group">
                                            <textarea class="form-control" name="content" rows="3">Good product...</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-info">Cập nhật</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add new comment -->
                    <form action="#" method="post">
                        <input type="hidden" name="method" value="POST">
                        <div class="form-group">
                            <label for="newComment">Viết bình luận:</label>
                            <textarea class="form-control" name="content" id="newComment" rows="3" required placeholder="Nhập bình luận..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
}
