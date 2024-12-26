<div class="grid__row">    
                
    <div class="grid__row">
              
        @foreach($blogs as $blog)
        <div class="col-sm-4" style="padding-right:10px;padding-left:10px;">
            <div class="picture-blog">
                <a href="{{ route('blogDetail', ['id' => $blog->id]) }}" class="img-blog">
                    <img src="{{asset('frontend/images/'.$blog->image)}}" loading="lazy" />
                  

                </a>
                <div class="date-blog">
                    <span class="day">{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>
                    <span class="month">{{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}</span>
                    <span class="year">{{ \Carbon\Carbon::parse($blog->created_at)->format('y') }}</span>
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