@extends('layouts.admin_layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm sản phẩm</h1>
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
                <div class="card-header">{{ __('Thêm sản phẩm') }}</div>
                <div class="card-body" >
                    <form method="POST" action="{{ route('addproduct')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="ten_sanpham" class="col-md-4 col-form-label text-md-end">{{ __('Tên sản phẩm:') }}</label>

                            <div class="col-md-6">
                                <input id="ten_sanpham" type="text" class="form-control @error('ten_sanpham') is-invalid @enderror" name="ten_sanpham" value="{{ old('ten_sanpham') }}" required autocomplete="ten_sanpham" autofocus>

                                @error('ten_sanpham')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gia_moi" class="col-md-4 col-form-label text-md-end">{{ __('Giá mới:') }}</label>

                            <div class="col-md-6">
                                <input id="gia_moi"  class="form-control @error('gia_moi') is-invalid @enderror" name="gia_moi" value="{{ old('gia_moi') }}" >

                                @error('gia_moi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gia_cu" class="col-md-4 col-form-label text-md-end">{{ __('Giá cũ:') }}</label>

                            <div class="col-md-6">
                                <input id="gia_cu"  class="form-control @error('gia_cu') is-invalid @enderror" name="gia_cu" value="{{ old('gia_cu') }}">

                                @error('gia_cu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="id_loai_sanpham" class="col-md-4 col-form-label text-md-end">{{ __('Loại sản phẩm:') }}</label>

                            <div class="col-md-6">
                                <select name="id_loai_sanpham" id="id_loai_sanpham" class="form-control">
                                    <option value="0">Loại sản phẩm</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id_loaisp}}">{{ $category->tenloaisp }}</option>
                                        @endforeach
                                </select>
                                @error('id_loai_sanpham')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="hinh_sanpham" class="col-md-4 col-form-label text-md-end">{{ __('Hình sản phẩm:') }}</label>

                            <div class="col-md-6">
                                <input id="hinh_sanpham" type="file" class="form-control @error('hinh_sanpham') is-invalid @enderror" name="hinh_sanpham" value="{{ old('hinh_sanpham') }}" >

                                @error('hinh_sanpham')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     
                        <div class="row mb-3">
                            <label for="thongtin_km" class="col-md-4 col-form-label text-md-end">{{ __('Thông tin khuyến mãi:') }}</label>

                            <div class="col-md-6">
                                <input id="thongtin_km" type="text" class="form-control @error('thongtin_km') is-invalid @enderror" name="thongtin_km" value="{{ old('thongtin_km') }}">

                                @error('thongtin_km')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="so_luong" class="col-md-4 col-form-label text-md-end">{{ __('Số lượng:') }}</label>

                            <div class="col-md-6">
                                <input id="so_luong" type="number" class="form-control @error('so_luong') is-invalid @enderror" name="so_luong" value="{{ old('so_luong') }}">

                                @error('so_luong')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="id_nhomsp" class="col-md-4 col-form-label text-md-end">{{ __('Nhóm sản phẩm:') }}</label>

                            <div class="col-md-6">
                                <select name="id_nhomsp" id="id_nhomsp" class="form-control">
                                    <option value="0">Chọn nhóm sản phẩm</option>
                                    @foreach ($groups as $group)
                                        <option value="{{$group->id_nhomsp}}">{{ $group->tennhom }}</option>
                                        @endforeach
                                </select>
                           
                                @error('id_nhomsp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- <div class="row mb-3">
                            <label for="created_at" class="col-md-4 col-form-label text-md-end">{{ __('Ngày tạo:') }}</label>

                            <div class="col-md-6">
                                <input id="created_at" type="datetime-local" class="form-control @error('created_at') is-invalid @enderror" name="created_at" value="{{ old('created_at') }}" required autocomplete="created_at">
                            
                                @error('created_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Thêm sản phẩm') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       
  
</section>
@endsection