@extends('layouts.admin_layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Nhóm Sản Phẩm</h1>
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
           
            
            <a style="margin-bottom:20px;" class="btn btn-primary" href="{{ route('creategroup')}}">
                Create
            </a>           
            <table class="table">
                <tr>
                    <th>
                       Tên nhóm sản phẩm   </th>
                    <th>
                     Ngày tạo
                    </th>
                   
                  
                    <th>
                      Ngày cập nhật
                    </th>    
                    <th>
                        Hành động      
                    </tr>
                 @foreach ($groups as $group)
                
                    <tr>
                        <td>{{$group->tennhom}}</td>
                            
                        <td>
                            {{$group->created_at}}
                        </td>
                        <td>
                            {{$group->updated_at}}
                        </td>
                       

                        <td>
                            <button class="btn btn-danger edit-group" data-id="{{ $group->id_nhomsp }}">Edit</button>
                            <a class="btn btn-success" href="{{route('deleteGroup',['id_nhomsp'=>$group->id_nhomsp])}}">Delete</a>
                          
                        </td>
                    </tr>
                @endforeach

            </table>
            {{ $groups->links('pagination::bootstrap-4') }}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    <div class="modal fade" id="editGroupModal" tabindex="-1" role="dialog" aria-labelledby="editGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGroupModalLabel">Edit Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editGroupForm">
                        @csrf
                        <input type="hidden" id="id_nhomsp" name="id_nhomsp">
                        <div class="form-group">
                            <label for="tennhom">Tên nhóm sản phẩm</label>
                            <input type="text" class="form-control" id="tennhom" name="tennhom" required>
                        </div>
                        <div class="form-group">
                            <label for="id_loaisp">Loại Sản Phẩm</label>
                            <select class="form-control" id="id_loaisp" name="id_loaisp" required>
                                <option value="" selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id_loaisp}}">{{ $category->tenloaisp }}</option>
                                @endforeach
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
            // Edit group
            $('.edit-group').click(function() {
                var id_nhomsp = $(this).data('id');
                $.ajax({
                    url: '/get-group/' + id_nhomsp,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            $('#id_nhomsp').val(response.group.id_nhomsp);
                            $('#tennhom').val(response.group.tennhom);
                            $('#id_loaisp').val(response.group.id_loaisp);
                            $('#editGroupModal').modal('show');
                        } else {
                            alert(response.error);
                        }
                    }
                });
            });

            $('#editGroupForm').submit(function(e) {
                e.preventDefault();
                var id_nhomsp = $('#id_nhomsp').val();
                var formData = new FormData(this);

                $.ajax({
                    url: '/update-group/' + id_nhomsp,
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
        });
    </script>
</section>

@endsection