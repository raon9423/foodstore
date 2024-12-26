@extends('layouts.admin_layout')
@section('content')


<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <h3 class="d-inline-block d-sm-none" style="color:blue;">
                    {{ $product->ten_sanpham }}  
                    </h3>
                                        <div class="col-12">
                                            <img src="{{asset('backend/images/'.$product->hinh_sanpham)}}" class="product-image" alt="Product Image">
                                        </div>

</div>
                <div class="col-12 col-sm-8">
                    <h3 class="my-3" style="color:blue;">  {{ $product->ten_sanpham }} </h3>
                    

                    <hr>
                    <h4>
                        <strong style="color:green"> Phân loại:</strong>
                        {{ $product->category->tenloaisp }}
                         </h4>
                 
                       
                    <h4 class="mt-3"><strong style="color:red">Nhóm sản phẩm:</strong> {{$product->group->tennhom}}</h4>
                    <h4>
                        <strong style="color:#000"> Số lượng:</strong>
                        {{ $product->so_luong }}
                         </h4>
                   
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    
                    </div>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                           {{ $product->gia_moi }}₫
                        </h2>
                        <h4 class="mt-0">
                            <small>EX TAX: {{ $product->gia_moi }} ₫</small>
                        </h4>
                    </div>

                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Add to Cart
                        </div>

                        <div class="btn btn-default btn-lg btn-flat">
                            <i class="fas fa-heart fa-lg mr-2"></i>
                            Add to Wishlist
                        </div>
                    </div>

                    <div class="mt-4 product-share">
                        <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-envelope-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-rss-square fa-2x"></i>
                        </a>
                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                        Cuối năm 2015, GoFood được đưa vào thử nghiệm với hình thức chuỗi cửa hàng chuyên bán lẻ thực phẩm tươi sống (thịt cá, rau củ, trái cây,…) và nhu yếu phẩm chất lượng, nguồn gốc rõ ràng.
                        Trải qua gần 6 năm phát triển,GoFood đã có gần 2.000 siêu thị trên khắp các tỉnh thành ở Miền Nam, Miền Đông và Nam Trung Bộ và hơn 20 kho hàng phục vụ cho website BGoFood chuyên cung cấp các sản phẩm đa dạng về chủng loại; giá cả hợp lý, nhân viên thân thiện, địa điểm dễ tiếp cận đối với người nội trợ.
                    </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                        Cuối năm 2015, GoFood được đưa vào thử nghiệm với hình thức chuỗi cửa hàng chuyên bán lẻ thực phẩm tươi sống (thịt cá, rau củ, trái cây,…) và nhu yếu phẩm chất lượng, nguồn gốc rõ ràng.
                        Trải qua gần 6 năm phát triển,GoFood đã có gần 2.000 siêu thị trên khắp các tỉnh thành ở Miền Nam, Miền Đông và Nam Trung Bộ và hơn 20 kho hàng phục vụ cho website GoFoodchuyên cung cấp các sản phẩm đa dạng về chủng loại; giá cả hợp lý, nhân viên thân thiện, địa điểm dễ tiếp cận đối với người nội trợ..
                    </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        Cuối năm 2015,GoFood được đưa vào thử nghiệm với hình thức chuỗi cửa hàng chuyên bán lẻ thực phẩm tươi sống (thịt cá, rau củ, trái cây,…) và nhu yếu phẩm chất lượng, nguồn gốc rõ ràng.
                        Trải qua gần 6 năm phát triển, GoFoodđã có gần 2.000 siêu thị trên khắp các tỉnh thành ở Miền Nam, Miền Đông và Nam Trung Bộ và hơn 20 kho hàng phục vụ cho website GoFood chuyên cung cấp các sản phẩm đa dạng về chủng loại; giá cả hợp lý, nhân viên thân thiện, địa điểm dễ tiếp cận đối với người nội trợ.
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection