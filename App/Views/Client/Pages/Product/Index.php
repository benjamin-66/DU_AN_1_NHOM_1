<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
            p.card-text {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 100%;
            }

            .card-price del {
                color: #999;
            }

            .card-price strong {
                color: red;
            }

            .new span {
                background: red;
                color: white;
                padding: 2px 6px;
                border-radius: 4px;
                font-size: 12px;
            }

            .box:hover {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                transition: 0.3s;
            }
        </style>
        <!-- Start Banner Area -->
	
        <!-- Start Banner Area -->
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

        <div class="container-fluid">
            <section class="shop_section layout_padding">
                <div class="row">
                    <div class="col-md-3">
                        <?php Category::render($data['categories']); ?>
                    </div>

                    <div class="col-md-9">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="text-danger">Sản phẩm</h3>
                            <form method="GET" action="/products/options">
                                <select name="order" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="asc">SẮP XẾP:</option>
                                    <option value="asc">TĂNG DẦN</option>
                                    <option value="desc">GIẢM DẦN</option>
                                </select>
                            </form>
                        </div>

                        <?php if (!empty($data['products'])) : ?>
                            <div class="row">
                                <?php foreach ($data['products'] as $item) : ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                        <div class="box p-2 border rounded">
                                            <a href="/products/<?= $item['id'] ?>">
                                                <img class="img-fluid" src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" style="height:150px;object-fit:cover;width:100%;">
                                                <p class="card-text mt-2"><?= $item['name'] ?></p>
                                                <div class="card-price">
                                                    <?php if ($item['discount_price'] > 0) : ?>
                                                        <del><?= number_format($item['price']) ?> đ</del><br>
                                                   <p>Giá Giảm <strong><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong></p>     
                                                    <?php else : ?>
                                                        <strong><?= number_format($item['price']) ?> đ</strong>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if ($item['is_feature'] == 1) : ?>
                                                    <div class="new mt-1"><span>Mới</span></div>
                                                <?php elseif ($item['is_feature'] == 2) : ?>
                                                    <div class="new mt-1"><span>Hot</span></div>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <h4 class="text-center text-danger">Không có sản phẩm</h4>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>

<?php
    }
}
?>
