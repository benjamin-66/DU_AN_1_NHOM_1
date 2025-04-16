<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
            p.card-text {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 500px;
            }
        </style>
     <section class="banner-area organic-breadcrumb">
                            <div class="container">
                                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                                    <div class="col-first">
                                        <h1>Shop Category page</h1>
                                        <nav class="d-flex align-items-center">
                                            <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                                            <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                                            <a href="category.html">Fashon Category</a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-8">
                    <img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="" width="80%" class="img-padding">
                </div>
                <div class="col-md-4">
                    <h1 class="fs-1"><?= $data['product']['name'] ?></h1>
                    <p>Mô tả: <?= $data['product']['description'] ?></p>

                    <?php if ($data['product']['discount_price'] > 0): ?>
                        <p>Giá gốc: <strike><?= number_format($data['product']['price']) ?> đ</strike></p>
                        <p id="price">
                            Giá giảm: <strong class="text-danger"><?= number_format($data['product']['price'] - $data['product']['discount_price']) ?> đ</strong>
                        </p>
                    <?php else: ?>
                        <h5>Giá tiền: <?= number_format($data['product']['price']) ?> đ</h5>
                    <?php endif; ?>

                    <div class="product-detail">
                        <div class="quantity-control">
                            <button onclick="decreaseQuantity()">-</button>
                            <input type="number" id="quantity" value="1" min="1" onchange="updatePrice()" />
                            <button onclick="increaseQuantity()">+</button>
                        </div>
                    </div>

                    <form action="/cart/add" method="post" onsubmit="syncQuantityBeforeSubmit()">
    <input type="hidden" name="method" value="POST">
    <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
    <input type="hidden" name="image" value="<?= $data['product']['image'] ?>">
    <input type="hidden" name="name" value="<?= $data['product']['name'] ?>">
    <input type="hidden" name="price" value="<?= $data['product']['price'] ?>">
    <!-- ✅ hidden quantity input -->
    <input type="hidden" name="quantity" id="form_quantity" value="1">
    <button type="submit" class="btn btn-success mt-3">Thêm vào giỏ hàng</button>
    <a class="btn btn-success mt-3" href="/pay">Mua Ngay</a>
</form>

<script>
    var basePrice = <?= ($data['product']['discount_price'] > 0) ? $data['product']['price'] - $data['product']['discount_price'] : $data['product']['price']; ?>;

    function updatePrice() {
        var quantity = parseInt(document.getElementById("quantity").value);
        if (isNaN(quantity) || quantity < 1) {
            quantity = 1;
        }
        var price = basePrice * quantity;
        document.getElementById("price").innerText = price.toLocaleString() + " VND /kg";

        // ✅ cập nhật input hidden để gửi đúng quantity
        document.getElementById("form_quantity").value = quantity;
    }

    function increaseQuantity() {
        let input = document.getElementById("quantity");
        input.value = Math.max(1, parseInt(input.value) + 1);
        updatePrice();
    }

    function decreaseQuantity() {
        let input = document.getElementById("quantity");
        input.value = Math.max(1, parseInt(input.value) - 1);
        updatePrice();
    }

    // ✅ gọi trước khi submit form để đảm bảo quantity cập nhật đúng
    function syncQuantityBeforeSubmit() {
        updatePrice();
    }

    // ✅ khi load trang cũng gọi 1 lần
    window.onload = updatePrice;
</script>

                    <br>
                   
                </div>
            </div>

            <hr>

            <div class="row">
               

                <div class="col-md-12 mt-5">
                    <hr>
                    <h3>Mô tả sản phẩm</h3>
                    <?= $data['product']['                                                                                                                                                                                                                                  description'] ?>
                </div>
            </div>

            <!-- BÌNH LUẬN -->
            <div class="row d-flex justify-content-center mt-100 mb-100">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Bình luận mới nhất</h4>
                        </div>
                        <div class="comment-widgets">
                            <?php if (!empty($data['comments'])): ?>
                                <?php foreach ($data['comments'] as $item): ?>
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-4">
                                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?: 'user1.jpeg' ?>" width="50" class="rounded-circle">
                                        </div>
                                        <div class="product_review_form">
                                            <h6 class="font-medium"><?= $item['name'] ?> <?= $item['username'] ?></h6>
                                            <span class="m-b-15 d-block"><?= $item['content'] ?></span>
                                            <div class="comment-footer">
                                                <span class="text-muted float-right"><?= $item['date'] ?></span>
                                                <?php if ($data['is_login'] && $_SESSION['user']['id'] == $item['user_id']): ?>
                                                    <button type="button" class="btn btn-cyan btn-sm" data-toggle="collapse" data-target="#<?= $item['username'] ?><?= $item['id'] ?>">Sửa</button>
                                                    <form action="/comments/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Chắc chưa?')" style="display:inline-block">
                                                        <input type="hidden" name="method" value="DELETE">
                                                        <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <h6 class="text-center text-danger">Chưa có bình luận</h6>
                            <?php endif; ?>

                            <?php if ($data['is_login']): ?>
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-4">
                                        <img src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['avatar'] ?? 'user1.jpeg' ?>" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?= $_SESSION['user']['name'] ?> <?= $_SESSION['user']['username'] ?></h6>
                                        <form action="/comments" method="post">
                                            <input type="hidden" name="method" value="POST">
                                            <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                                            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                                            <div class="form-group">
                                                <label for="">Bình luận</label>
                                                <textarea class="form-control rounded-0" name="content" rows="3" placeholder="Nhập bình luận..."></textarea>
                                            </div>
                                            <div class="comment-footer">
                                                <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="/login">
                                    <h6 class="text-center text-danger">Vui lòng đăng nhập để bình luận</h6>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
