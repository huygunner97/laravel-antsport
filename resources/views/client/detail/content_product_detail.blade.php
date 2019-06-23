@extends ('client.detail.index')

@include ('client.layout.RemoveUnicode')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
        <a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="san-pham/{{$product_detail->categoryDetail->category->pk_category_id}}/{{removeUnicode($product_detail->categoryDetail->category->c_name)}}">{{$product_detail->categoryDetail->category->c_name}}</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="san-pham/{{$product_detail->categoryDetail->pk_category_detail_id}}/{{removeUnicode($product_detail->categoryDetail->category->c_name)}}/{{removeUnicode($product_detail->categoryDetail->c_name)}}">{{$product_detail->categoryDetail->c_name}}</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="chi-tiet/{{$product_detail->pk_product_id}}/{{removeUnicode($product_detail->c_name)}}" class="active-text">{{$product_detail->c_name}}</a>
    </div>
</div>
<!-- main -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="category">
                    @include ('client.layout.menu_detail')
                    <div class="related_product">
                        <div class="related_title" style="margin-top: 20px;">
                            <span>Sản phẩm liên quan</span>
                        </div>
                        <hr>
                        <div class="show_related_product">
                            @foreach ($product_related as $pr)
                                <a href="chi-tiet/{{$pr->pk_product_id}}/{{removeUnicode($pr->c_name)}}">
                                    <img src="public/upload/product/{{$pr->c_img}}" >
                                    <span>{{$pr->c_name}}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="show_product">
                    <div class="product_detail">
                        <div class="product_top">
                            <h2 style="text-align: center; display: none;">{{$product_detail->c_name}}</h2>
                            <div class="product_img">
                                <img src="public/upload/product/{{$product_detail->c_img}}" id="img">
                                <div class="small_img">
                                    <img src="public/upload/product/{{$product_detail->c_img1}}" id="img1">
                                    <img src="public/upload/product/{{$product_detail->c_img2}}" id="img2">
                                    <img src="public/upload/product/{{$product_detail->c_img3}}" id="img3">
                                    <img src="public/upload/product/{{$product_detail->c_img4}}" id="img4">
                                </div>
                            </div>
                            <div class="product_title">
                                <form method="post" action="gio-hang/add/{{$product_detail->pk_product_id}}">
                                    @csrf
                                    <h1>{{$product_detail->c_name}}</h1>
                                    <h2>{{number_format($product_detail->c_price)}}đ</h2>
                                    <div class="classify">
                                        @if ($product_detail->categoryDetail->fk_category_detail_id == 2)
                                            <p>Size :</p>
                                            <input type="checkbox" name="classify" value="Size : 39" checked>39&emsp;
                                            <input type="checkbox" name="classify" value="Size : 40">40&emsp;
                                            <input type="checkbox" name="classify" value="Size : 41">41&emsp;
                                            <input type="checkbox" name="classify" value="Size : 42">42&emsp;
                                            <input type="checkbox" name="classify" value="Size : 43">43
                                        @elseif ($product_detail->categoryDetail->fk_category_detail_id == 1)
                                            <p>Màu :</p>
                                            <input type="checkbox" name="classify" value="Màu : xanh" checked>Xanh&emsp;
                                            <input type="checkbox" name="classify" value="Màu : đỏ">Đỏ&emsp;
                                            <input type="checkbox" name="classify" value="Màu : vàng">Vàng&emsp;
                                            <input type="checkbox" name="classify" value="Màu : trắng">Trắng&emsp;
                                            <input type="checkbox" name="classify" value="Màu : đen">Đen
                                        @endif
                                        <p>Số lượng :&emsp;<input type="number" name="number" value="1" min="1"></p>
                                    </div>
                                    <input type="submit" value="Mua Ngay">
                                </form>
                            </div>
                        </div>
                        <div class="product_bottom">
                            <div class="title">
                                <span>Thông tin sản phẩm</span>
                            </div>
                            <div class="description">
                                <span>{!! $product_detail->c_description !!}</span>
                            </div>
                        </div>
                    </div>
                    <div class="fb-comments" data-href="http://localhost/sport-project/laravel/chi-tiet/{{$product_detail->pk_product_id}}/{{removeUnicode($product_detail->c_name)}}" data-width="100%"></div>
                </div>
            </div>
        </div>
        <div class="category_responsive">
            <div class="related_title" style="margin-top: 20px;">
                <span>Sản phẩm liên quan</span>
            </div>
            <hr>
            <div class="show_related_product">
                @foreach ($product_related as $pr)
                <a href="chi-tiet/{{$pr->pk_product_id}}/{{removeUnicode($pr->c_name)}}">
                    <img src="public/upload/product/{{$pr->c_img}}" >
                    <span>{{$pr->c_name}}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end main -->

<!-- plugin fb  -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=280958119443586&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- plugin fb -->

@endsection

