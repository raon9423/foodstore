@extends('layouts.layout')
@section('content')
<style>
    /* .container {
      
    } */
    .blog-container {
       
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 2.5em;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }
    .short-content {
        font-size: 1.2em;
        color: #666;
        text-align: center;
        margin-bottom: 20px;
    }
    .picture-blog img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .content-blog p {
        font-size: 2em;
        line-height: 1.6;
        color: #000;
        margin-bottom: 15px;
    }
    .blog-container p {
        font-size: 2em;
        line-height: 1.6;
        color: #000;
        margin-bottom: 15px;
    }
</style>
    <div class="container">
        <div class="grid">
            <div class="blog-container">
               <h1>
                     {{$blog->nameBlog}}
               </h1>
                <p>
                    {{$blog->shortContent}}
                </p>
                <div class="picture-blog">
                    <img src="{{asset('frontend/images/'.$blog->image)}}" loading="lazy" />
                   
                </div>
                <div class="content-blog">
                    @foreach($paragraphs as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>
            </div>
    </div>

@endsection