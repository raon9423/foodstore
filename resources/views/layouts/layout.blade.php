<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="{{asset('frontend/css/base.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/reponsive.css')}}" type="text/css" />
   
    <link rel="shortcut icon" href="{{asset('frontend/images/vy.jpg')}}"  type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    
        <!-- Other head content -->
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    

</head>
<body>
<script src="https://sf-cdn.coze.com/obj/unpkg-va/flow-platform/chat-app-sdk/1.0.0-beta.4/libs/oversea/index.js"></script>
      <script>
          new CozeWebSDK.WebChatClient({
            config: {
              bot_id: '7445883735151214608',
            },
            componentProps: {
              title: 'Coze',
            },
          });
      </script>
    <div class="app">
        <header>
            <div class="apptop">
                <div class="grid">
                    <nav class="header__navbar">
                        <ul class="navbar-list">
                            <li class="navbar-item"><a href="{{URL::to('/trangchu')}}" class="navbar-item__link hover-under-anima" >Trang chủ</a></li>
                            <li class="navbar-item"><a href="" class="navbar-item__link " >Chọn cửa hàng gần bạn</a></li>
                            <li class="navbar-item">
                                <span class="navbar-no-cursor">Kết nối</span>
                                <a href="" class="navbar-icon-link">
                                    <i class="navbar-icon fab fa-facebook"></i>
                                </a>
                                <a href="" class="navbar-icon-link">
                                    <i class="navbar-icon fab fa-instagram"></i>
                                </a>

                            </li>
                        </ul>
                        <ul class="navbar-list">
                            <li class="navbar-item">
                                <a class="navbar-item__link">
                                    <i class="navbar-icon far fa-thin fa-bell"></i>
                                    Thông báo
                                </a>
                            </li>
                            <li class="navbar-item">
                                <i class="navbar-icon far fa-question-circle"></i>
                                <a href="" class="navbar-item__link hover-under-anima" >Hỗ trợ</a>
                            </li>

                                    @guest
                                    <li class="navbar-item"><a href="{{route('login')}}" class="navbar-item__link hover-under-anima">Đăng nhập</a></li>
                                    <li class="navbar-item"><a href="{{route('register')}}" class="navbar-item__link hover-under-anima">Đăng ký</a></li>
  
                                    @endguest
                                  

                                @auth
                               

                                    <li class="navbar-item"><a class="navbar-item__link hover-under-anima">{{ Auth::user()->name }}</a></li>
                                    <li class="navbar-item">
                                        <a href="{{ route('logout') }}" class="navbar-item__link hover-under-anima"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Thoát
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                  
                                @endauth
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="header">
                <div class="grid">
                    <div class="header-main">
                        <div class="header-logo">
                            <a href="{{URL::to('/home')}}" class="logo__link">
                                <img src="{{asset('frontend/images/go.png')}}" alt="" style="width:160px;height:40px">
                            </a>
                        </div>
                        <!-- <div class="header-hotline hotline1">
                            <div class="phone">
                                <a href="#">
                                    1900 2309
                                </a>
                                <span>(7h30 -12h45 & 13h30 - 22h) </span>
                                <a href="#" class="iconphone">
                                    <i class="fas fa-phone"></i>
                                </a>
                            </div>
                        </div> -->
                
                            <form action="{{route('search')}}">
                            <div class="header-search">


                                <div class="header__search-input-wrap">
                                    <input type="text" name="searching" id="searching" class="header__search-input" placeholder="Rau , củ quả m hải sản, nước ngọt...">

                                    <!--
       <div class="header__search-history">
           <h3 class="search-history-heading">Lịch sử tìm kiếm</h3>
           <ul class="search-history-list">
               <li class="search-history-item">
                   <a href="#">
                       Mặt hàng giảm giá
                   </a>
               </li>
               <li class="search-history-item">
                   <a href="#">
                       Rau sạch
                   </a>
               </li>
               <li class="search-history-item">
                   <a href="#">
                       Rau sạch
                   </a>
               </li>
               <li class="search-history-item">
                   <a href="#">
                       Rau sạch
                   </a>
               </li>
           </ul>
       </div>
    -->

                                </div>

                                <button class="header__search-btn" type="submit">
                                    <i class="header__search-btn-icon fas fa-search"></i>
                                </button>

                            </div>
                            </form>
                        <div class="header-hotline">
                            <div class="phone">
                                <a href="#">
                                    1900 2309
                                </a>
                                <span>(7h30 -12h45 & 13h30 - 22h) </span>
                                <a href="#" class="iconphone">
                                    <i class="fas fa-phone"></i>
                                </a>
                            </div>
                        </div>
                        {{-- cart --}}
                        @include('includes.cartInfo')
                    </div>
                </div>
            </div>
            <div class="main-nav">
                <div class="grid">
                    <div class="nav-item">
                        <div class="menu-listcate">
                            <i class="fas fa-bars"></i>
                            <a style="text-decoration:none;color:#fff;" href="{{URL::to('/productcategory/ca')}}" >Danh mục sản phẩm</a>
                            <div class="listcate">
                                <ul class="nav-listcate">
                                   
                                    @foreach( $categories as $cate)
                                    <li class="listcate-item">
                                        @if($cate->trangthai ==="Hiện")
                                        <a class="listcate-item__link">
                                        
                                            {{$cate->tenloaisp}}
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        @endif
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                @foreach($groups as $group)
                                                    @if($cate->id_loaisp == $group->id_loaisp)
                                                    
                                                        <a href="{{ route('productcategory', ['id_nhomsp' => $group->id_nhomsp]) }}" class="products-list__item-link">
                                                            {{$group->tennhom}}
                                                        </a>
                                                   
                                                    @endif
                                                   
                                                    @endforeach
                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{ asset('frontend/images/'.$cate->anh_loaisp) }}" alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    @endforeach
{{--                                  @   
                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Rau , Củ , Nấm , Trái Cây
                                            <i class=" fas fa-angle-right" style="float: right;"></i>

                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="">Rau , Củ </a>
                                                    <a href="">Nấm </a>
                                                    <a href="">Trái Cây </a>

                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/raucunam.gif')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Kem, Thực Phẩm Đông Lạnh
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Kem </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Thịt Đông </a>
                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/thucphamdl.gif')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Bánh Kẹo Các Loại
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Bánh Xốp </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Bánh Quy </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Kẹo</a>
                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/banhkeocl.gif')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Bia Đồ Uống Có Cồn
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Bia </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })"> Bia Lạnh </a>
                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/bia.gif')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Sữa Các Loại
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Sữa Tươi </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Sữa Chua </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Sữa Bột , Váng Sữa </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Sữa Đặc </a>
                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/suacl.gif')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Nước Ngọt , Nước Giải Khát
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Cà Phê</a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Nước Ngọt </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Trà Các Loại </a>

                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/nuocngot.gif')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Mì ,Miến , Cháo Phở
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Mì Tôm </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Cháo </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Phở </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Bún </a>
                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/micl.gif')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Trứng , Đậu Hủ
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Trứng </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">
                                                        Đậu Hủ
                                                    </a>


                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/trung.gif')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Thực Phẩm Khô
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Gạo </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Ngũ Cốc </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Bột Các Loại </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Rong Biển - Tảo Biển </a>
                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/thucphamkho.gif')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                   
                                    <li class="listcate-item">
                                        <a class="listcate-item__link">
                                            Hôm Nay Ăn Gì ?
                                            <i class=" fas fa-angle-right" style="float: right;"></i>
                                        </a>
                                        <div class="img-nav">
                                            <div class="content">
                                                <div class="name-nav">
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Cà Phê </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Cháo </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Nước Ngọt </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Thịt , Cá </a>
                                                    <a href="@Url.Action("ProductCategory", "Product", new { idnhom = "ca" })">Trái Cây </a>
                                                </div>
                                                <div class="img-listcate">
                                                    <img src="{{asset('frontend/images/homany.gif')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li> 
 --}}
                                </ul>
                            </div>
                        </div>


                        <div class="nav-news">
                            <div class="hot-news mt-r-20">
                                <!-- <i class="fa-regular fa-envelope" style="margin-right:5px"></i> -->

                                <span>Giao diện</span>

                            </div>
                            <div class="hot-news">
                                <!-- <i class="fas fa-headset" style="margin-right:5px"></i> -->
                                <span>Ngôn ngữ</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
       
            @yield('content')
          
        <div class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2-5">
                        <h4>CHĂM SÓC KHÁC HÀNG</h4>
                        <ul class="list-ft__text">
                            <li class="ft__item"><a href="" class="ft-hover-a">Trung tâm trợ giúp</a></li>
                            <li class="ft__item"><a href="{{URL::to('/blog')}}" class="ft-hover-a">GoFood Blog</a></li>
                            <li class="ft__item"><a href="" class="ft-hover-a">Deliverry</a></li>
                            <li class="ft__item"><a href="{{URL::to('/support')}}" class="ft-hover-a">Hướng dẫn mua hàng</a></li>
                            <li class="ft__item"><a href="{{URL::to('/support')}}" class="ft-hover-a">Hướng dẫn thanh toán</a></li>
                        </ul>
                    </div>
                    <div class="grid__column-2-5">
                        <h4>ABOUT GOFOOD</h4>
                        <ul class="list-ft__text">
                            <li class="ft__item"><a href="{{route('home.about')}}" class="ft-hover-a">Giới thiệu về GoFood</a></li>
                            <li class="ft__item"><a href="" class="ft-hover-a">Điều khoản</a></li>
                            <li class="ft__item"><a href="" class="ft-hover-a">Tuyển dụng</a></li>
                            <li class="ft__item"><a href="" class="ft-hover-a">Chính sách bảo mật</a></li>
                            <li class="ft__item"><a href="" class="ft-hover-a">Chương trình nhận quà miễn phí</a></li>
                            <li class="ft__item"><a href="" class="ft-hover-a">Kênh người bán</a></li>
                            <li class="ft__item"><a href="" class="ft-hover-a">Flash sales</a></li>
                        </ul>
                    </div>
                    <div class="grid__column-2-5">

                        <h4>THANH TOÁN</h4>
                        <ul class="list-ft__text pay">
                            <li class="ft__item"><a href="#"><img src="{{asset('frontend/images/visa.png')}}" style="width: 45px; height: 45px;" alt="Visa" title="Visa"></a></li>
                            <li class="ft__item"><a href="#"><img src="{{asset('frontend/images/zalo.png')}}" style="width: 45px; height: 45px;" alt="Zalo Pay" title="Zalo Pay"></a></li>
                            <li class="ft__item"><a href="#"><img src="{{asset('frontend/images/momo.jpg')}} " style="width: 45px; height: 45px;" alt="Momo" title="Momo"></a></li>
                            <li class="ft__item"><a href="#"><img src="{{asset('frontend/images/vt.jpg')}}" style="width: 45px; height: 45px;object-fit: cover;" alt="Bank" title="Bank"></a></li>
                            <li class="ft__item"><a href="#"><img src="{{asset('frontend/images/apppay.png')}}" style="width: 45px; height: 45px;object-fit: contain;" alt="Apple Pay" title="Apple Pay"></a></li>
                            <li class="ft__item"><a href="#"><img src="{{asset('frontend//images/ggpay.png')}}" style="width: 45px; height: 45px;object-fit: contain;" alt="Google Pay" title="Google Pay"></a></li>

                        </ul>

                    </div>

                    <div class="grid__column-2-5">
                        <h4>STORE INFORMATION</h4>
                        <ul class="list-ft__text">
                            <li class="ft__item"><a href="#"><i class="fa fa-location-dot" style="margin-right: 5px;"></i>233 Nguyễn Tất Thành , Hồ Chí Minh</a></li>
                            <li class="ft__item"><a href="#"><i class="ti-email" style="margin-right: 5px;"></i>Email Us: Thân Dương Hiếu</a></li>
                            <li class="ft__item"><a href="#"><i class="fas fa-phone" style="margin-right: 5px;"></i>0123456789</a></li>

                        </ul>
                    </div>
                    <div class="grid__column-2-5">
                        <h4></h4>
                        <ul class="list-ft__text">
                            <li class="ft__item"><a href="{{URL::to('/trangchu')}}" class="logo__link"><img src="{{asset('frontend/images/go.png')}}" style="height: 50px;"></a></li>
                            <li class="ft__item"><button onclick="" class="btns btn--primary  ">Views More</button></li>

                        </ul>
                    </div>
                </div>
                <div class="footext">
                    &copy; Coppy Right By GoFood @<?php echo (new DateTime())->format('Y'); ?>
                </div>
            </div>
        </div>
    </div>

    

    <script src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/js.js')}}"></script>
  
    <script src="{{asset('frontend/js/modernizr-2.8.3.js')}}"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
</body>
</html>