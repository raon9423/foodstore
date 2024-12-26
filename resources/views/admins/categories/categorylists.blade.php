@extends('layouts.admin_layout')
@section('content')
<style>
    .status-toggle:hover {
       
        cursor: pointer;
    
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Loại Sản Phẩm</h1>
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
            <form class="form-inline ml-3">
            </form>
          
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
           
            
            <a style="margin-bottom:20px;" class="btn btn-primary" href="{{ route('createCategory')}}">
                Create
            </a>           
            <table class="table">
                <tr>
                    <th>
                       Tên sản loại phẩm   
                    </th>

                    <th>
                     Trạng thái
                    </th>
                    <th>
                        Hình loại sản phẩm     
                    </th>   
                    <th>
                        Ngày tạo 
                    </th>
                    <th>
                        Ngày cập nhật
                    </th>
                    <th>
                        Hành động  
                    </th>
                          

                    </tr>
                 @foreach ($categories as $category)
                
                    <tr>
                        <td>{{$category->tenloaisp}}</td>

                        <td>
                            <span style="font-size: 16px" class="badge status-toggle {{ $category->trangthai === 'Hiện' ? 'badge-success' : 'badge-danger' }}" 
                                data-id="{{ $category->id_loaisp }}" 
                                id="status-{{ $category->id_loaisp }}">
                                {{ $category->trangthai }}
                          </span>
                           
                        <td>

                            <img src="{{ asset('backend/images/'.$category->anh_loaisp) }}" alt="" style="width: 100px; height: 100px;">
                        </td>
                        <td>
                            {{$category->created_at}}
                        </td>
                        <td>
                            {{$category->updated_at}}
                        </td>
      

                        <td>
                          
                            <button class="btn btn-danger edit-category" data-id="{{ $category->id_loaisp }}">Edit</button>
                            <button class="btn btn-success delete-category" data-id="{{ $category->id_loaisp }}">Delete</button>
                            {{-- <a class="btn btn-info" href="">Detail</a> --}}
                        </td>
                    </tr>
                @endforeach

            </table>
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        @csrf
                        <input type="hidden" id="edit_id_loaisp" name="id_loaisp">
                        <div class="form-group">
                            <label for="edit_tenloaisp">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" id="edit_tenloaisp" name="tenloaisp" required>
                        </div>
                      
                        <div class="form-group">
                            <label for="edit_anh_loaisp">Ảnh loại sản phẩm</label>
                            <input type="file" class="form-control" id="edit_anh_loaisp" name="anh_loaisp">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <!-- /.card -->





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Bắt sự kiện click vào trạng thái
            $('.status-toggle').on('click', function () {
                const id_loaisp = $(this).data('id');
                const statusElement = $(this);
    
                $.ajax({
                    url: "{{ route('admin.toggleStatus', '') }}/" + id_loaisp,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            // Cập nhật giao diện
                            const newStatus = response.trangthai;
                            if (newStatus === 'Hiện') {
                                statusElement.text('Hiện')
                                             .removeClass('bg-danger')
                                             .addClass('bg-success');
                            } else {
                                statusElement.text('Ẩn')
                                             .removeClass('bg-success')
                                             .addClass('bg-danger');
                            }
                        } else {
                            alert('Có lỗi xảy ra khi thay đổi trạng thái.');
                        }
                    },
                    error: function () {
                        alert('Không thể thay đổi trạng thái.');
                    }
                });
            });
        });
    </script> 


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script>
    // delete category
      $(document).ready(function() {
        $('.delete-category').click(function() {
            var id_loaisp = $(this).data('id');
            var token = "{{ csrf_token() }}";

            if (confirm('Are you sure you want to delete this category?')) {
                $.ajax({
                    url: '/delete-category/' + id_loaisp,
                    type: 'DELETE',
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
     // Edit category
     $('.edit-category').click(function() {
            var id_loaisp = $(this).data('id');
            $.ajax({
                url: '/get-category/' + id_loaisp,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        $('#edit_id_loaisp').val(response.category.id_loaisp);
                        $('#edit_tenloaisp').val(response.category.tenloaisp);
                        $('#edit_trangthai').val(response.category.trangthai);
                        $('#editCategoryModal').modal('show');
                    } else {
                        alert(response.error);
                    }
                }
            });
        });

        // Update category
        $('#editCategoryForm').submit(function(e) {
            e.preventDefault();
            var id_loaisp = $('#edit_id_loaisp').val();
            var formData = new FormData(this);

            $.ajax({
                url: '/update-category/' + id_loaisp,
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