<div class="grid__column-3">
    <nav class="category">
        <h3 class="category__heading">
            <i class="category__heading-icon  ti-menu-alt"></i>
            Danh Mục Sản Phẩm
        </h3>
        <ul class="category-list">
            @foreach ($categories as $category)
                <li class="category-item">
                    <a class="category-item__link">
                        {{ $category->tenloaisp}}
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <div class="productslist">
                        <ul class="products-list__item">
                            @foreach ($groups as $group)
                            @if($category->id_loaisp == $group->id_loaisp)
                                <li class="products-list__item-item">
                                    <a href="{{ route('productcategory', ['id_nhomsp' => $group->id_nhomsp]) }}" class="products-list__item-link">
                                        {{$group->tennhom}}
                                    </a>
                                </li>
                            @endif
                        @endforeach

                        </ul>
                    </div>
                </li>
                
            @endforeach

        </ul>
    </nav>
    <nav class="category ">

        <h3 class="category__heading">
            Giá tốt mỗi tuần
        </h3>
        <div class="heading-cate-btn">
            <i class="fa-solid fa-angle-left"></i>
            <i class="fa-solid fa-angle-right"></i>
        </div>


        <div class="img-sidebar">
            <a href="#" class="home-product-item">
                <div class="product-item__img" style="background-image: url(/images/Products/r1.jpg);">
                </div>
                <h4 class="product-item__name">Rau giá rẻ</h4>
                <div class="product-item__price">
                    <span class="product-item__price-old">340.000₫</span>
                    <span class="product-item__price-new">340.000₫</span>

                </div>
               
                <ul class="product-time">
                    <li>
                        <p id="day"></p>
                        <p>Ngày</p>
                    </li>
                    <li>
                        <p id="hour"></p>
                        <p>Giờ</p>
                    </li>
                    <li>
                        <p id="minute"></p>
                        <p>Phút</p>
                    </li>
                    <li>
                        <p id="second"></p>
                        <p>Giây</p>
                    </li>
                 
                </ul>

            </a>
        </div>


    </nav>

</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
    document.getElementById("day").innerHTML = days;
    document.getElementById("hour").innerHTML = hours;
    document.getElementById("minute").innerHTML = minutes;
    document.getElementById("second").innerHTML = seconds;
  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("time").innerHTML = "EXPIRED";
  }
}, 1000);
</script>