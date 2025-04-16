<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Đăng ký tài khoản</h1>
                        <nav class="d-flex align-items-center">
                            <a href="/">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                            <a href="#">Tài khoản<span class="lnr lnr-arrow-right"></span></a>
                            <a href="#">Đăng ký</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h2 class="text-center text-danger">ĐĂNG KÝ</h2>

                        <form action="/register" method="post">
							<input type="hidden" name="method" value="POST" >
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ và tên" >
                            </div>

                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" >
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" >
                            </div>

                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu" >
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" s>
                            </div>

                            <div class="text-center mt-3">
                                <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                                <button type="submit" class="btn btn-outline-info">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
