@extends('layouts.layout')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<div class="app__container" style="background-color:#fff">
    <div class="grid container-item">

        <div class="container-side">
            <div class="mySlides">
                <div class="numbertext">1 / 6</div>
                <img src="{{asset('frontend/images/'.$product->hinh_sanpham)}}" style="width:100%;height:540px">
            </div>

            <div class="mySlides">
                <div class="numbertext">2 / 6</div>
                <img src="~/images/Products/tt2.jpg" style="width:100%;height:540px">

            </div>

            <div class="mySlides">
                <div class="numbertext">3 / 6</div>
                <img src="~/images/Products/tt3.jpg" style="width:100%;height:540px">
            </div>

            <div class="mySlides">
                <div class="numbertext">4 / 6</div>
                <img src="~/images/Products/tt4.jpg" style="width:100%;height:540px">
            </div>

            <div class="mySlides">
                <div class="numbertext">5 / 6</div>
                <img src="~/images/Products/tt5.jpg" style="width:100%;height:540px">
            </div>
            <div class="mySlides">
                <div class="numbertext">6 / 6</div>
                <img src="~/images/Products/tt6.jpg" style="width:100%;height:540px">
            </div>


            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <div class="row-detail">

                <div class="column-detail">
                    <img class="demo cursor" src="~/images/Products/tt1.jpg" style="width:100%" onclick="currentSlide(1)">
                </div>
                <div class="column-detail">
                    <img class="demo cursor" src="~/images/Products/tt2.jpg" style="width:100%" onclick="currentSlide(2)">
                </div>
                <div class="column-detail">
                    <img class="demo cursor" src="~/images/Products/tt3.jpg " style="width:100%" onclick="currentSlide(3)">
                </div>
                <div class="column-detail">
                    <img class="demo cursor" src="~/images/Products/tt4.jpg" style="width:100%" onclick="currentSlide(4)">
                </div>
                <div class="column-detail">
                    <img class="demo cursor" src="~/images/Products/tt5.jpg " style="width:100%" onclick="currentSlide(5)">
                </div>
                <div class="column-detail">
                    <img class="demo cursor" src="~/images/Products/tt6.jpg" style="width:100%" onclick="currentSlide(6)">
                </div>

            </div>
        </div>
        <div class="container-sideright">
            <h2 class="title">{{$product->ten_sanpham}}</h2>
            <div class="exp">
                <span>HSD trên 3 tháng</span>
            </div>
            <div class="price">
                <span class="new-price"><strong>{{ number_format($product->gia_moi, 0, ',', '.') }}₫ </strong></span>
                <span class="old-price"> {{ number_format($product->gia_cu, 0, ',', '.') }}₫ </span>
                <label>-10%</label>
            </div>
            <div class="buy">
                <a href="{{route('orderNow',['id_sanpham'=>$product->id_sanpham])}}" class="chooseproduct">
                    CHỌN MUA
                </a>
                <span class="promotion"><i>(Khuyến mãi chỉ áp dụng mua Online)</i></span>
            </div>
        </div>

    </div>
    <div class="desc-products">
        <div class="grid ">
            <div class="container-item">
                <div class="details">
                    <button class="tablink" onclick="openPage('Home', this, '#008848  ')" id="defaultOpen" style="border: none;">
                        <h2 class="details-heading separated-color ">Thông tin sản phẩm</h2>
                    </button>
                    <button class="tablink" onclick="openPage('News', this, '#008848')">
                        <h2 class="details-heading separated-color">Đánh giá sản phẩm</h2>
                    </button>
                    <button class="tablink" onclick="openPage('Contact', this, '#008848')">
                        <h2 class="details-heading separated-color">Hướng dẫn sử dụng</h2>
                    </button>


                    <div id="Home" class="tabcontent">
                        <div class="details-p">
                            <p><font color="#288ad6">Hộp 2 bánh trung thu Kinh Đô bộ đôi An Nhiên </font>là sản phẩm mới với hộp bánh Kinh Đô sắc đỏ đẹp mắt, thiết kế ấn tượng. Hộp 2 bánh trung thu với nhân thập cẩm jambon và nhân sữa dừa kèm trứng <font color="#288ad6">mang đến vị ngon đậm đà, bắt vị.</font></p>
                        </div>
                        <ul class="lists-desc">
                            <li>
                                <span>Loại bánh</span>
                                <div>Bánh nướng</div>
                            </li>
                            <li>
                                <span>Số lượng</span>
                                <div>Hộp 2 bánh trung thu</div>
                            </li>
                            <li>
                                <span>Số trứng</span>
                                <div>1 trứng/ bánh</div>
                            </li>
                            <li>
                                <span>Thành phần</span>
                                <div>
                                    Hộp bao gồm các loại bánh
                                    Bánh trung thu sữa dừa 1 trứng 150g
                                    Bánh trung thu thập cẩm Jambon 1 trứng 150g
                                </div>
                            </li>
                            <li>
                                <span>Khối lượng</span>
                                <div>150g/ bánh</div>
                            </li>
                            <li>
                                <span>Hạn sử dụng</span>
                                <div>Trước 01/10/2023</div>
                            </li>
                            <li>
                                <span>Thương hiệu</span>
                                <div>Kinh Đô</div>
                            </li>
                            <li>
                                <span>Sản xuất</span>
                                <div>Việt Nam</div>
                            </li>

                        </ul>
                    </div>

                    <div id="News" class="tabcontent">
                        <div class="details-p">
                            <p>
                                Bạn có hài lòng với thông tin sản phẩm này không?
                            </p>
                        </div>
                        <ul class="lists-desc">
                            <li>
                                <span>
                                    <button class="btns">
                                        Hài Lòng
                                        <i class="fa fa-face-smile" style="margin-left: 5px;color: #555;"></i>
                                    </button>
                                </span>
                                <div>
                                    <button class="btns">
                                        Không Hài Lòng
                                        <i class="fa fa-face-meh" style="margin-left: 5px;color: #555;"></i>
                                    </button>

                                </div>
                            </li>


                        </ul>
                        <div class="rating">
                            <div class="head-rate">
                                <span class="user-heading">User Rating</span>
                                <div class="star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <p>4.1 average based on 254 reviews.</p>
                            <hr style="border: 1px solid #288ad6;">
                            <div class="row1">
                                <div class="side">
                                    <div>5 star</div>
                                </div>
                                <div class="midlle">
                                    <div class="bar-container">
                                        <div class="bar-5"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>150</div>
                                </div>

                                <div class="side">
                                    <div>4 star</div>
                                </div>
                                <div class="midlle">
                                    <div class="bar-container">
                                        <div class="bar-4"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>60</div>
                                </div>
                                <div class="side">
                                    <div>3 star</div>
                                </div>
                                <div class="midlle">
                                    <div class="bar-container">
                                        <div class="bar-3"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>10</div>
                                </div>

                                <div class="side">
                                    <div>2 star</div>
                                </div>
                                <div class="midlle">
                                    <div class="bar-container">
                                        <div class="bar-2"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>66</div>
                                </div>

                                <div class="side">
                                    <div>1 star</div>
                                </div>
                                <div class="midlle">
                                    <div class="bar-container">
                                        <div class="bar-1"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>16</div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div id="Contact" class="tabcontent">
                        <div class="details-p">
                            <p>Dịp trung thu này hãy cùng gia đình thưởng thức bộ đôi bánh trung thu <font color="red"> "THU VUI KHỎE"</font> từ thương hiệu Kinh Đô. Đây là một trong những sản phẩm nổi bật của năm nay với các bánh thơm ngon được giảm đi lượng đường đến 70% giúp bảo vệ sức khỏe người tiêu dùng.</p>
                        </div>
                        <ul class="lists-desc">
                            <li>
                                <span>Bảo quản</span>
                                <div>Nơi có nhiệt độ không quá 50 độ</div>
                            </li>
                            <li>
                                <span>Giá trị dinh dưỡng trong mỗi chiếc bánh</span>
                                <div>
                                    Trong đó đầu cá hồi là loại cá có chứa Omega-3 giàu EPA và DHA, protein cùng nhiều dưỡng chất thiết yếu khác như vitamin B, kali và selen,... đều là những dưỡng chất cần thiết cho cơ thể.
                                </div>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- <div class="somenewlinks">
                    <div class="title-newlinks">
                        <h2>MẸO HAY TRONG GIA ĐÌNH</h2>
                        <a href="" style="margin-right: 15px;">
                            Xem các tin bài khác
                            <i class="ti-angle-right" style="font-size: 9px;"></i>
                        </a>
                    </div>
                    <a href="">
                        <img src="~/images/Products/mh1.jpg" alt="">
                        <p>Cách làm cá kình hấp rau mồng tơi ngọt thanh , bổ dưỡng , chất lượng , rẻ , an toàn</p>
                    </a>
                    <a href="">
                        <img src="~/images/Products/mh2.jpg" alt="">
                        <p>Cách làm cá kình hấp rau mồng tơi ngọt thanh , bổ dưỡng , chất lượng , rẻ , an toàn</p>
                    </a>
                    <a href="">
                        <img src="~/images/Products/mh3.jpg" alt="">
                        <p>Cách làm cá kình hấp rau mồng tơi ngọt thanh , bổ dưỡng</p>
                    </a>
                    <a href="">
                        <img src="~/images/Products/mh4.jpg" alt="">
                        <p>Cách làm cá kình hấp rau mồng tơi ngọt thanh , bổ dưỡng</p>
                    </a>
                    <a href="">
                        <img src="~/images/Products/mh5.jpg" alt="">
                        <p>Cách làm cá kình hấp rau mồng tơi ngọt thanh , bổ dưỡng</p>
                    </a>
                    <a href="">
                        <img src="~/images/Products/mh6.jpg" alt="">
                        <p>Cách làm cá kình hấp rau mồng tơi ngọt thanh , bổ dưỡng</p>
                    </a>
                    <a href="">
                        <img src="~/images/Products/mh7.jpg" alt="">
                        <p>Cách làm cá kình hấp rau mồng tơi ngọt thanh , bổ dưỡng</p>
                    </a>

                </div> -->
            </div>
        </div>


    </div>

</div>
<script>
        let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
    // tab content //
    function openPage(pageName, elmnt, color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.color = "";

        }

        document.getElementById(pageName).style.display = "block";
        elmnt.style.color = color;

    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
@endsection
