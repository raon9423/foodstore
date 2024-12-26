@extends('layouts.admin_layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Sản Phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <form class="" action="{{route('searchProduct')}}">
         
          
                <div class="header-search" style="max-width:300px;">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" name="searching" id="searching">
                        <div class="input-group-append">
                            <button style="background:grey" class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
           
            
            <a style="margin-bottom:20px;" class="btn btn-primary" href="{{ route('createproduct')}}">
                Create
            </a>           
            <table class="table">
                <tr>
                    <th>
                       Tên sản phẩm   </th>
                    <th>
                      Giá Cũ
                    </th>
                    <th>  Giá Mới
                    </th>
                  
                    <th>
                        Hình sản phẩm     
                    </th>    
                    <th>
                        Hành động      
                    </tr>
                 @foreach ($products as $product)
                
                    <tr>
                        <td>{{$product->ten_sanpham}}</td>

                        <td>{{$product->gia_cu}}₫</td>

                        <td>{{$product->gia_moi}}₫</td>
                        
                        <td>
                            <img src="{{ asset('backend/images/'.$product->hinh_sanpham) }}" alt="" style="width: 100px; height: 100px;">
                        </td>

                        <td>
                            <button class="btn btn-danger edit-product" data-id="{{ $product->id_sanpham }}">Edit</button>
                            <button class="btn btn-success delete-product" data-id="{{$product->id_sanpham}}">Delete</button>
                           <a class="btn btn-info" href="{{ route('productDetail', ['id_sanpham' => $product->id_sanpham]) }}">Detail</a> 
                        </td>
                    </tr>
                @endforeach

            </table>
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    {{-- model form edit --}}
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm">
                        @csrf
                        <input type="hidden" id="id_sanpham" name="id_sanpham">
                        <div class="form-group">
                            <label for="ten_sanpham">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="ten_sanpham" name="ten_sanpham" required>
                        </div>
                        <div class="form-group">
                            <label for="gia_moi">Giá Mới</label>
                            <input type="text" class="form-control" id="gia_moi" name="gia_moi" required>
                        </div>
                        <div class="form-group">
                            <label for="gia_cu">Giá Cũ</label>
                            <input type="text" class="form-control" id="gia_cu" name="gia_cu" required>
                        </div>
                        <div class="form-group">
                            <label for="id_loai_sanpham">Loại Sản Phẩm</label>
                            <select class="form-control" id="id_loai_sanpham" name="id_loai_sanpham" required>
                                
                                <option value="{{$products->category->id_loaisp ?? ''}}">{{$products->category->tenloaisp ?? 'Select Category'}}</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id_loaisp}}">{{ $category->tenloaisp }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hinh_sanpham">Hình Sản Phẩm</label>
                            <input type="file" class="form-control" id="hinh_sanpham" name="hinh_sanpham">
                        </div>
                        
                        <div class="form-group">
                            <label for="thongtin_km">Thông Tin Khuyến Mãi</label>
                            <input type="text" class="form-control" id="thongtin_km" name="thongtin_km" >
                        </div>
                        <div class="form-group">
                            <label for="so_luong">Số Lượng</label>
                            <input type="text" class="form-control" id="so_luong" name="so_luong" required>
                        </div>
                        <div class="form-group">
                            <label for="id_nhomsp">Nhóm Sản Phẩm</label>
                            <select class="form-control" id="id_nhomsp" name="id_nhomsp" required>
                                <option value="{{$products->group->id_nhomsp ?? ''}}">{{$products->group->tennhom ?? 'Select Category'}}</option>
                                @foreach ($groups as $group)
                                    <option value="{{$group->id_nhomsp}}">{{ $group->tennhom }}</option>
                                @endforeach
                                <!-- Options will be populated by JavaScript -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script>
      $(document).ready(function() {
        $('.delete-product').click(function() {
            var id_sanpham = $(this).data('id');
            var token = "{{ csrf_token() }}";
            if (confirm('Are you sure you want to delete this product?')) {
                $.ajax({
                    url: '/delete-product/' + id_sanpham ,
                    type: 'GET',
                    data: {
                        "_token": token,
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.success);
                            location.reload();
                        } else {
                            alert(response.error);
                        }
                    }
                });
            }
        });
    });
     //  Edit product
     $('.edit-product').click(function() {
            var id_sanpham = $(this).data('id');
            $.ajax({
                url: '/get-product/' + id_sanpham,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        $('#id_sanpham').val(response.product.id_sanpham);
                        $('#ten_sanpham').val(response.product.ten_sanpham);
                        $('#gia_moi').val(response.product.gia_moi);
                        $('#gia_cu').val(response.product.gia_cu);
                        $('#id_loai_sanpham').val(response.product.id_loai_sanpham);
                     //   $('#hinh_sanpham').val(response.product.hinh_sanpham);
                        $('#thongtin_km').val(response.product.thongtin_km);
                        $('#so_luong').val(response.product.so_luong);
                        $('#id_nhomsp').val(response.product.id_nhomsp);
                        $('#editProductModal').modal('show');
                    } else {
                        alert(response.error);
                    }
                }
            });
        });
   

         // Update category
        $('#editProductForm').submit(function(e) {
             e.preventDefault();
             var id_sanpham = $('#id_sanpham').val();
             var formData = new FormData(this);

            $.ajax({
                 url: '/update-product/' + id_sanpham,
                 type: 'POST',
                 data: formData,
                 contentType: false,
                 processData: false,
                 success: function(response) {
                     if (response.success) {
                         alert(response.success);
                         location.reload();
                     } else {
                         alert(response.error);
                     }
                 }
             });
         });
    
    
    </script>
</section>
@endsection