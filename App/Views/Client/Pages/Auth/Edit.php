<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;


class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					
				</div>
			</div>
		</div>
	</section>
        <!-- code HTML hien thi giao dien -->
        <section id="company-services" class="padding-large">
        </section>


        <div class="container mt-5">
            <div class="row">
                <div class="offset-mb-1 col-md-3">
                    <?php
                    if ($data && $data['avatar']) :
                    ?>
                        <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="" width="100%">
                    <?php
                    else :
                    ?>
                        <img src="<?= APP_URL ?>/public/uploads/users/user2.jpeg" alt="" width="100%">

                    <?php
                    endif;
                    ?>
                </div>
                <div class="col-md-7">
                    <div class="card card-body">
                        <h4 class="text-center text-danger">Thông tin tài khoản</h4>
                        <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="method" value="PUT">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" value="<?= $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập Email" value="<?= $data['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Họ và tên*</label>
                                <input type="name" name="name" id="name" class="form-control" placeholder="Nhập Họ và tên" value="<?= $data['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Ảnh đại diện*</label>
                                <input type="file" name="avatar" id="avatar" class="form-control" placeholder="Chọn ảnh đại diện">
                            </div>

                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}
