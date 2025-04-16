<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>

<!-- Bắt đầu khu vực chân trang -->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Về Chúng Tôi</h6>
                    <p>
                        Chúng tôi là một nhóm phát triển, chuyên cung cấp các sản phẩm chất lượng và dịch vụ uy tín cho khách hàng.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Bản Tin</h6>
                    <p>Nhận thông tin cập nhật mới nhất từ chúng tôi</p>
                    <div id="mc_embed_signup">
                        <form target="_blank" novalidate="true"
                              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="form-inline">
                            <div class="d-flex flex-row">
                                <input class="form-control" name="EMAIL" placeholder="Nhập email của bạn"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập email của bạn'"
                                       required type="email">
                                <button class="click-btn btn btn-default">
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                </div>
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Hình Ảnh Instagram</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <li><img src="/public/assets/client/img/i1.jpg" alt=""></li>
                        <li><img src="/public/assets/client/img/i2.jpg" alt=""></li>
                        <li><img src="/public/assets/client/img/i3.jpg" alt=""></li>
                        <li><img src="/public/assets/client/img/i4.jpg" alt=""></li>
                        <li><img src="/public/assets/client/img/i5.jpg" alt=""></li>
                        <li><img src="/public/assets/client/img/i6.jpg" alt=""></li>
                        <li><img src="/public/assets/client/img/i7.jpg" alt=""></li>
                        <li><img src="/public/assets/client/img/i8.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Theo Dõi Chúng Tôi</h6>
                    <p>Kết nối với chúng tôi trên mạng xã hội</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0">
                Bản quyền &copy;<script>document.write(new Date().getFullYear());</script> | Thiết kế với <i class="fa fa-heart-o" aria-hidden="true"></i> bởi
                <a href="https://colorlib.com" target="_blank">Colorlib</a>
            </p>
        </div>
    </div>
</footer>
<!-- Kết thúc khu vực chân trang -->

<script src="/public/assets/client/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="/public/assets/client/js/vendor/bootstrap.min.js"></script>
<script src="/public/assets/client/js/jquery.ajaxchimp.min.js"></script>
<script src="/public/assets/client/js/jquery.nice-select.min.js"></script>
<script src="/public/assets/client/js/jquery.sticky.js"></script>
<script src="/public/assets/client/js/nouislider.min.js"></script>
<script src="/public/assets/client/js/countdown.js"></script>
<script src="/public/assets/client/js/jquery.magnific-popup.min.js"></script>
<script src="/public/assets/client/js/owl.carousel.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="/public/assets/client/js/gmaps.min.js"></script>
<script src="/public/assets/client/js/main.js"></script>

</body>
</html>

<?php
    }
}
?>
