@extends('layouts.layout')
@section('title', 'Blog - GoFood')
@section('content')

    <div class="app__container">
        <div class="banner-blog">
            <div class="stick-blog">
                <h1>
                    Fully-Prepared & Delivered Fresh To Daily
                </h1>
                <span>
                    Chúng tôi xin được cung cấp đến quý khách hàng một số bài viết có liên quan. Thông tin những bài viết là hoàn toàn đúng sự thật và
                    được đội ngũ nhân viên kiểm duyệt rõ ràng.
                </span>
            </div>
    
        </div>
        <div class="blog grid" style="margin-top:50px;">
            <h3 class="tittle-blog">
                Tổng hợp tất cả bài viết của GoFood.
            </h3>
            <div class="grid__row">
              
                    @foreach($blogs as $blog)
                    <div class="col-sm-4" style="padding-right:10px;padding-left:10px;">
                        <div class="picture-blog">
                            <a href="{{ route('blogDetail', ['id' => $blog->id]) }}" class="img-blog">
                                <img src="{{asset('frontend/images/'.$blog->image)}}" loading="lazy" />
                              

                            </a>
                            <div class="date-blog">
                                <span class="day">
                                    {{$blog->day}}
                                </span>
                                <span class="month">
                                    {{$blog->month}}
                                </span>
                                <span class="year">
                                    {{$blog->year}}
                                </span>
                            </div>
                        </div>
                        <div class="info-blog">
                            <a href="{{ route('blogDetail', ['id' => $blog->id]) }}" class="name-blog">
                                {{$blog->nameBlog}}
                            </a>
                            <p>
                                {{$blog->shortContent}}
                            </p>
                        </div>
                    </div>
                       @endforeach 
              
            </div>
        </div>
    
    </div>

    @endsection