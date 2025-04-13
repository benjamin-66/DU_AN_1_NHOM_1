<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <h5 class="text-center mb-3 fw-bold text-uppercase">Danh mục</h5>

        <div class="list-group">
            <a href="/products" class="list-group-item list-group-item-action <?= ($_SERVER['REQUEST_URI'] == '/products') ? 'active' : '' ?>">
                Tất cả
            </a>

            <?php foreach ($data as $item) : ?>
                <a href="/products/categories/<?= $item['id'] ?>" 
                   class="list-group-item list-group-item-action <?= (strpos($_SERVER['REQUEST_URI'], '/products/categories/' . $item['id']) !== false) ? 'active' : '' ?>">
                   <?= $item['name'] ?>
                </a>
            <?php endforeach; ?>
        </div>

<?php
    }
}
?>
