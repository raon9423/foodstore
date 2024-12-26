@extends('layouts.admin_layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm nhóm sản phẩm</h1>
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
                <div class="card-header">{{ __('Thêm nhóm sản phẩm') }}</div>
                <div class="card-body" >
                    <form method="POST" action="{{ route('addGroup')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="id_nhomsp" class="col-md-4 col-form-label text-md-end">{{ __('ID nhóm sản phẩm:') }}</label>

                            <div class="col-md-6">
                                <input id="id_nhomsp" type="text" class="form-control @error('id_nhomsp') is-invalid @enderror" name="id_nhomsp" value="{{ old('id_nhomsp') }}" required autocomplete="id_nhomsp" autofocus>

                                @error('id_nhomsp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tennhom" class="col-md-4 col-form-label text-md-end">{{ __('Tên nhóm sản phẩm:') }}</label>

                            <div class="col-md-6">
                                <input id="tennhom" type="text" class="form-control @error('tennhom') is-invalid @enderror" name="tennhom" value="{{ old('tennhom') }}" required autocomplete="tennhom" >

                                @error('tennhom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_loaisp" class="col-md-4 col-form-label text-md-end">{{ __('Loại sản phẩm:') }}</label>
                            <div class="col-md-6">

                                <select name="id_loaisp" id="id_loaisp" class="form-control">
                                    <option value="0">Chọn loại sản phẩm</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id_loaisp }}">{{ $category->tenloaisp }}</option>
                                        @endforeach
                                </select>

                            
                                @error('id_loaisp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
        
                     
                       
                        
                     
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Thêm nhóm sản phẩm') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       
  
</section>
@endsection