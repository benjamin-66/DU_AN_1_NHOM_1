<?php
// sản phẩm theo loại

namespace App\Views\Client\Pages\Product;


use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;


class Category extends BaseView
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
	<!-- End Banner Area -->

						 <div class="container-fluid">

            <section class="shop_section layout_padding">

                <div class="row">
                    <div class="col-md-3">
                        <?php
                        ComponentsCategory::render($data['categories']);
                        ?>
                    </div>
                    <div class="col-md-9">

                        <?php
                        if (isset($data) && isset($data['products']) && $data && $data['products']) :
                        ?>

                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="text-danger"><?php if (!empty($data['products'][0]['category_name'])): ?>
                                                <span><?= $data['products'][0]['category_name'] ?></span>
                                            <?php else: ?>
                                                <span>Sản phẩm</span>
                                            <?php endif; ?>
                                        </h3>
                                    </div>
                                    <div class="col-md-3 text-right">

                                        <form method="GET" action="/products/options">


                                            <select name="order" id="order" class="form-select" onchange="this.form.submit()" aria-label="Disabled select example">
                                                <option value="asc">SẮP XẾP:</option>
                                                <option value="asc">TĂNG DẦN</option>
                                                <option value="desc">GIẢM DẦN</option>
                                            </select>
                                            <!-- <button type="submit">Lọc giá</button> -->
                                        </form>

                                    </div>
                                    <script>

                                    </script>

                                </div>
                            </div>
                            <div class="row">
                                <?php
                                foreach ($data['products'] as $item) :
                                ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="box">
                                            <a href="/products/<?= $item['id'] ?>" class="">
                                                <div class="card mb-4 shadow-sm ">
                                                    <img class="img-index" id="" src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" class="card-img-top" alt="" data-holder-rendered="true">
                                                </div>
                                                <div class="">
                                                    <h6>
                                                        <p class="card-text"><?= $item['name'] ?></p>
                                                    </h6>
                                                    <h6>
                                                        <?php
                                                        if ($item['discount_price'] > 0) :
                                                        ?>
                                                            <p>Giá gốc: <strike><?= number_format($item['price']) ?> đ</strike></p>
                                                            <p>Giảm giá: <strong class="text-danger"><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong></p>

                                                        <?php
                                                        else :
                                                        ?>
                                                            <p>Giá tiền: <?= number_format($item['price']) ?> đ</p>

                                                        <?php
                                                        endif;
                                                        ?>
                                                    </h6>
                                                </div>
                                                <div class="new">
                                                    <span>
                                                        <?= ($item['is_feature'] == 1) ? 'Mới' : (($item['is_feature'] == 2) ? 'Hot' : '') ?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                <?php
                                endforeach;
                                ?>
                            </div>
                        <?php
                        else :
                        ?>
                            <h3 class="text-center text-danger">Không có sản phẩm</h3>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
        </div>
        </section>
        </div>


      
<?php

    }
}
