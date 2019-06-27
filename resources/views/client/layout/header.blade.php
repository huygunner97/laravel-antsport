<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.3'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="311725165842877"
  theme_color="#99c95c">
</div>

{{--header --}}
<div class="opacity-responsive" id="opacity-responsive" onclick="closeNav()"></div>
<div class="opacity-login" id="opacity-login" onclick="closeLogin(); closeSignup(); closeCheckout(); closeForgetPass(); closeResetPass()"></div>
<div class="header">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <ul class="ul-inform">
                        <li>
                            <i class="fas fa-phone"></i>Hotline:
                            <a href="#">037.406.8393</a>
                        </li>
                        <li class="hidden-xs">
                            <i class="fas fa-envelope"></i>Email:
                            <a href="#">vanhuy97bn@gmail.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-0">
                    <ul class="ul-social">
                        <li>
                            <a href="#" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fab fa-google-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-main">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-2">
                    <div class="logo">
                        <a href="">
                            <img src="public/images/logo.png">
                        </a>
                    </div>
                    <div class="button-responsive">
                        <i class="fas fa-bars" onclick="openNav()"></i>
                    </div>
                </div>
                <div class="col-lg-5  col-7">
                    <div class="search-header">
                        <form action="tim-kiem" method="GET" class="input-group">
                            <input type="text" class="input-group-field" placeholder="Tìm kiếm sản phẩm " name="search">
                            <button class="input-group-btn" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-3">
                    <div class="index-cart">
                        <a href="gio-hang" class="header-cart">
                            <i class="fas fa-shopping-cart"></i><span class="cart-text">Giỏ hàng</span>
                            <span class="number-cart">
                                @if (session('number'))
                                    {{ session('number') }}
                                @else
                                    {{ 0 }}
                                @endif
                            </span>
                        </a>
                    </div>
                    <div class="account-header">
                        <div class="account-login">
                            <i class="fas fa-user-circle"></i>
                            @if (session('name'))
                                <div class="account-login-name">{!!session('name')!!}</div>
                            @else
                                <div class="account-login-text">
                                    Đăng nhập<br/>
                                    <span>Tài khoản và đơn hàng</span>
                                </div>
                            @endif
                        </div>
                        <ul class="account-login-hidden">
                            @if (!session('name'))
                                <a onclick="openSignup()"><li>Đăng ký</li></a>
                                <a onclick="openLogin()"><li>Đăng nhập</li></a>
                            @else
                                <a href="dang-xuat"><li>Đăng xuất</li></a>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login">
        <i class="fas fa-times-circle exit" onclick="closeLogin()"></i>
        <form>
            <table cellpadding="5" style="width: 95%;">
                <tr>
                    <th>Đăng nhập</th>
                </tr>
                <tr>
                    <td><i>*</i>Email :</td>
                </tr>
                <tr>
                    <td><input type="email" name="email" value="{{old('email')}}" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-email"></div></td>
                </tr>
                <tr>
                    <td><i>*</i>Password :</td>
                </tr>
                <tr>
                    <td><input type="password" name="password" value="" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-pass"></div></td>
                </tr>
                <tr>
                    <td><input type="submit" id="submit"  value="Gửi">
                        <a class="change-signup" onclick="closeLogin(); openSignup()">Đăng ký ?</a>
                        <a class="forget-pass-link" onclick="closeLogin(); openForgetPass()">Quên mật khẩu ?</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="forget-pass">
        <i class="fas fa-times-circle exit" onclick="closeForgetPass()"></i>
        <form>
            <table cellpadding="5" style="width: 95%;">
                <tr>
                    <th>Quên mật khẩu</th>
                </tr>
                <tr>
                    <td><i>*</i>Email :</td>
                </tr>
                <tr>
                    <td><input type="email" name="email" value="{{old('email')}}" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-email"></div></td>
                </tr>
                <tr>
                    <td><input type="submit" id="submit"  value="Gửi">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="reset-pass">
        <i class="fas fa-times-circle exit" onclick="closeResetPass()"></i>
        <form>
            <table cellpadding="5" style="width: 95%;">
                <tr>
                    <th>Đổi mật khẩu</th>
                </tr>
                <tr>
                    <td><i>*</i>Email :</td>
                </tr>
                <tr>
                    <td><input type="email" name="email" value="{{old('email')}}" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-email"></div></td>
                </tr>
                <tr>
                    <td><i>*</i>Mật khẩu mới :</td>
                </tr>
                <tr>
                    <td><input type="password" name="password" value="" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-pass"></div></td>
                </tr>
                <tr>
                    <td><i>*</i>Xác nhận mật khẩu :</td>
                </tr>
                <tr>
                    <td><input type="password" name="confirm" value="" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-confirm"></div></td>
                </tr>
                <tr>
                    <td><input type="submit" id="submit"  value="Gửi"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="signup">
        <i class="fas fa-times-circle exit" onclick="closeSignup()"></i>
        <form>
            <table cellpadding="5" style=" width: 95%;">
                <tr>
                    <th >Đăng ký</th>
                </tr>
                <tr>
                    <td><i>*</i>Tên người dùng :</td>
                </tr>
                <tr>
                    <td><input type="text" name="name" value="{{old('name')}}" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-name"></div></td>
                </tr>
                <tr>
                    <td><i>*</i>Email :</td>
                </tr>
                <tr>
                    <td><input type="email" name="email" value="{{old('email')}}" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-email"></div></td>
                </tr>
                <tr>
                    <td><i>*</i>Mật khẩu :</td>
                </tr>
                <tr>
                    <td><input type="password" name="password" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-pass"></div></td>
                </tr>
                <tr>
                    <td><i>*</i>Xác nhận mật khẩu :</td>
                </tr>
                <tr>
                    <td><input type="password" name="confirm"></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-confirm"></div></td>
                </tr>
                <tr>
                    <td><i style="color: #9ca0a7">Thông tin liên hệ</i></td>
                </tr>
                <tr>
                    <td><i>*</i>Địa chỉ :</td>
                </tr>
                <tr>
                    <td><input type="text" name="address" value="{{old('address')}}"></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-address"></div></td>
                </tr>
                <tr>
                    <td><i>*</i>Điện thoại :</td>
                </tr>
                <tr>
                    <td><input type="text" name="phone" value="{{old('phone')}}" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-phone"></div></td>
                </tr>
                <tr>
                    <td><input type="submit" id="submit" name="signup" value="Gửi"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="checkout">
        <i class="fas fa-times-circle exit" onclick="closeCheckout()"></i>
        <form>
            <table cellpadding="5" style="width: 95%">
                <tr>
                    <th >Thông tin liên hệ</th>
                </tr>
                <tr>
                    <td>Họ tên :</td>
                </tr>
                <tr>
                    <td><input type="text" name="name" value="{{old('name')}}" > </td>
                </tr>
                <tr>
                    <td><div class="alert-err err-name"></div></td>
                </tr>
                <tr>
                    <td>Địa chỉ :</td>
                </tr>
                <tr>
                    <td><input type="text" name="address" value="{{old('address')}}" ></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-address"></div></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                </tr>
                <tr>
                    <td><input type="text" name="phone" value="{{old('phone')}}"></td>
                </tr>
                <tr>
                    <td><div class="alert-err err-phone"></div></td>
                </tr>
                <tr>
                    <td><input type="submit" id="submit" value="Xác nhận" ></td>
                </tr>
            </table>
        </form>
    </div>
