@extends('layouts.admin_layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm loại sản phẩm</h1>
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
<section class="content"> 
            <div class="card">
                <div class="card-header">{{ __('Thêm loại sản phẩm') }}</div>
                <div class="card-body" >
                    <form method="POST" action="{{ route('addCategory')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="id_loaisp" class="col-md-4 col-form-label text-md-end">{{ __('ID loại sản phẩm:') }}</label>

                            <div class="col-md-6">
                                <input id="id_loaisp" type="text" class="form-control @error('id_loaisp') is-invalid @enderror" name="id_loaisp" value="{{ old('id_loaisp') }}" required autocomplete="id_loaisp" autofocus>

                                @error('id_loaisp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tenloaisp" class="col-md-4 col-form-label text-md-end">{{ __('Tên loại sản phẩm:') }}</label>

                            <div class="col-md-6">
                                <input id="tenloaisp" type="text" class="form-control @error('tenloaisp') is-invalid @enderror" name="tenloaisp" value="{{ old('tenloaisp') }}" required autocomplete="tenloaisp" >

                                @error('tenloaisp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="trangthai" class="col-md-4 col-form-label text-md-end">{{ __('Trạng thái:') }}</label>
                            <div class="col-md-6">

                            {{-- <select name="trangthai"  class="form-control">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>   
                            </select> --}}

                            
                                @error('trangthai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="anh_loaisp" class="col-md-4 col-form-label text-md-end">{{ __('Hình loại sản phẩm:') }}</label>

                            <div class="col-md-6">
                                <input id="anh_loaisp" name="anh_loaisp" type="file" class="form-control">

                                @error('anh_loaisp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                     
                       
                        
                     
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Thêm loại sản phẩm') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       
  
</section>
@endsection