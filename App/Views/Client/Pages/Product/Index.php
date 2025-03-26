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
                /* Ngăn chữ xuống dòng */
                overflow: hidden;
                /* Ẩn nội dung tràn */
                text-overflow: ellipsis;
                /* Hiển thị dấu 3 chấm */
                max-width: 500px;
                /* Đặt chiều rộng tối đa cho cột */
            }
        </style>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
        <div class="container-fluid">
            <section class="shop_section layout_padding">
                <div class="row">
                    <div class="col-md-3">
                        <div>

                            <?php
                            Category::render($data['categories']);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <?php
                        if (count($data) && count($data['products'])) :
                        ?>
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="text-danger">
                                            Sản phẩm
                                        </h3>
                                    </div>
                                    <div class="col-md-3 text-right  ">
                                        <!-- <label for="fruits">Sắp xếp theo mặc định:</label>
                                        <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light   " form="fruitform">
                                            <option value="asc">Từ thấp đến cao:</option>
                                            <option value="saab">Popularity</option>
                                            <option value="opel">Organic</option>
                                            <option value="audi">Fantastic</option>
                                        </select>
                                    </div>
                                </div> -->
                                        <!DOCTYPE html>
                                        <html lang="vi">

                                        <head>
                                            <meta charset="UTF-8">
                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                            <title>Lọc giá từ thấp tới cao và ngược lại</title>
                                        </head>

                                        <body>


                                            <form method="GET" action="/products/options">


                                                <select name="order" id="order" class="form-select" onchange="this.form.submit()" aria-label="Disabled select example">
                                                    <option value="asc">SẮP XẾP:</option>
                                                    <option value="asc">TĂNG DẦN</option>
                                                    <option value="desc">GIẢM DẦN</option>
                                                </select>
                                                <!-- <button type="submit">Lọc giá</button> -->
                                            </form>

                                        </body>

                                        </html>

                                    </div>

                                    <div class="row">
                                        <?php
                                        foreach ($data['products'] as $item) :
                                        ?>
                                            <div class="col-sm-6 col-md-4 col-lg-3">
                                                <div class="box" id="box">
                                                    <a href="/products/<?= $item['id'] ?>" class="">
                                                        <div class="card mb-4 shadow-sm">

                                                            <img class="img-index" src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?> " class="card-img-top" alt="" data-holder-rendered="true" style="height: 130px;">
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
                                                            <span class="">
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
