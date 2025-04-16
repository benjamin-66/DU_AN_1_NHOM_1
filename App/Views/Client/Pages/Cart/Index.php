<?php

namespace App\Views\Client\Pages\Cart;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {

        $is_login = AuthHelper::checkLogin();


?>

        <style>
            td {
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

<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					
					
				</div>
			</div>
		</div>
	</section>

        <div class="container mt-5 mb-5">
            <h1 class="text-center">Giỏ hàng</h1>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $item) {
                            // Kiểm tra xem giá trị có hợp lệ trước khi thực hiện number_format
                            $price = isset($item['price']) && is_numeric($item['price']) ? $item['price'] : 0;
                            $quantity = isset($item['quantity']) && is_numeric($item['quantity']) ? $item['quantity'] : 0;
                            $item_total = $price * $quantity;
                            $total += $item_total;
                    ?>

                            <tr>
                            <td><img src="<?= APP_URL ?>/public/uploads/products/<?= htmlspecialchars($item['image'] ?? '') ?>" alt="" style="width: 100px; height: 100px;"></td>
<td><?= htmlspecialchars($item['name'] ?? '') ?></td>
<td><?= htmlspecialchars($item['quantity'] ?? '') ?></td>
                                <td><?= number_format($price) ?></td>
                                <td><?= number_format($item_total) ?></td>
                                <td>
                                    <a href="/cart/remove/<?= $item['product_id'] ?>" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="5" scope="col">Tổng tiền</td>
                        <td><?= number_format($total) ?> Vnd</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-5">
                <div class="d-flex justify-content-between">
                    <form action="/cart/delete-all" method="post">
                        <input type="hidden" name="method" id="" value="DELETE">

                    </form>
                    <?php
                    if ($is_login) :
                    ?>
                        <div d-flex>
                            <a href="/products" class="btn btn-outline-dark ">Tiếp tục mua sắm</a>
                            <a href="/pay" class="btn btn-outline-dark">Thanh toán</a>
                        </div>
                    <?php
                    else :
                    ?>
                        <a href="/login">
                            <h4 class="text-center text-danger">
                                <button type="button" class="btn btn-outline-dark"> Vui lòng đăng nhập để thanh toán</button>

                            </h4>
                        </a>
                    <?php
                    endif;
                    ?>


                </div>


            </div>

        </div>

<?php

    }
}
?>
