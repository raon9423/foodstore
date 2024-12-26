@extends('layouts.layout')
@section('title', 'Giỏ hàng của bạn')

@section('content')
 
<div class="app__container">
@if (session('success'))
    <div class="alert alert-notify alert-success alert-dismissible fade show" role="alert" id="success-alert">
        <span>  {{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  
    @else
    <div class="alert alert-notify alert-danger alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="cart-content">
     
        @if (Session::has('Carts'))
            <form action="{{route('updateCart')}}" method="POST">
                @csrf
                <div class="title-head">
                    Giỏ Hàng Của Bạn
                </div>
                <div class="block">
                    <div class="block-product">
                        <h4>Hàng Có Sẵn </h4>
                        @foreach (Session::get('Carts') as $cart)
                            @php
                                $p = $cart->product->gia_moi;
                                $q = $cart->quantity;
                                $subtotal = $p * $q;
                            @endphp
                            <div class="added">
                                <div class="img-pro">
                                    <img src="{{ asset('frontend/images/' . $cart->product->hinh_sanpham) }}" alt="">
                                </div>
                                <div class="info">
                                    <a class="name">
                                        <small>Có sẵn</small>
                                        {{ $cart->product->ten_sanpham }}
                                    </a>
                                </div>
                                <div class="preserve">
                                    <i class="fas fa-snowflake" style="margin-left: 5px;"></i>
                                    Bảo quản ở nơi đông lạnh
                                </div>
                                <div class="colmoney">
                                    <span id="errmsg" style="color:red;font-size:14px;position:absolute;bottom:-22px;width:200px"></span>
                                    <div class="money"><strong>{{ number_format($subtotal, 0, ',', '.') }} ₫</strong></div>
                                    <div class="quality">
                                        <div class="qualityum">
                                            <i class="noselect minus">-</i>
                                            <input type="text" name="quantity[]" class="soluong quantity" id="soluong quantity" value="{{ $cart->quantity }}" />
                                            <i class="noselect plus">+</i>
                                        </div>
                                    </div>
                                </div>
                                <span class="removeItem">
                                    <a href="{{route('removeItem',['id_sanpham'=>$cart->product->id_sanpham])}}">X</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="buy-ticket">
                    <div class="ticket">
                        <a href="" class="vouchers">
                            <i class="fas fa-ticket"></i>
                            Phiếu mua hàng
                        </a>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </div>
                <div class="phi_gh">
                    @php
                        $temp = Session::get('Carts');
                        $total = array_sum(array_map(function($cart) {
                            return $cart->quantity * $cart->product->gia_moi;
                        }, $temp));
                    @endphp
                    <div class="tamtinh">
                        Thành tiền:
                    </div>
                    <div class="money_tamtinh">{{ number_format($total, 0, ',', '.') }}₫</div>
                </div>
                <div class="updatecart">
                    <a href="">
                        <i class="fas fa-backward"></i> 
                        Tiếp tục mua hàng
                    </a>
                    <input type="submit" value="Cập nhật giỏ hàng" class="btns btn--primary">
                </div>
                <div class="order-btn">
                    <a href="{{route('checkOut')}}" class="btns btn--primary btn-ord">ĐẶT HÀNG</a>
                    <a onclick="opencart()" class="remove-cart">
                        <i class="fa fa-trash"></i>
                        Xóa giỏ hàng
                    </a>
                </div>
            </form>
        @else
            <div class="no-cart">
                <img style="width:100%" src="{{ asset('frontend/images/empty-cart.jpg') }}" />
            </div>
        @endif
    </div>
</div>
<div id="modal-cart" class="modal-cart">
    <div class="modal-cart-content">
        <div class="modal-cart-header">
            <h2>Bạn có muốn xóa hết sản phẩm?</h2>
        </div>
        <div class="modal-cart-body">
            <a href="{{route('clearCart')}}" onclick="toast()">Xóa</a>
            <a onclick="closecart()">Hủy</a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">


  // Tự động tắt thông báo sau 3 giây
  setTimeout(function () {
            let alert = document.getElementById('success-alert');
            if (alert) {
                alert.classList.remove('show'); // Ẩn thông báo
                alert.classList.add('fade');   // Tạo hiệu ứng mờ dần
            }
        }, 3000); // 3 giây

    const plus = document.querySelectorAll(".plus"),
        minus = document.querySelectorAll(".minus"),
        num = document.querySelectorAll(".quantity");
    for (let i = 0; i < plus.length; i++) {
        let b = parseInt(num[i].value);
        plus[i].addEventListener("click", () => {
            b++;
            b = (b < 10) ? "0" + b : b;
            num[i].value = b;
        });
        minus[i].addEventListener("click", () => {
            if (b > 0) {
                b--;
                b = (b < 10) ? "0" + b : b;
                num[i].value = b;
            }
        });
    }

    var modal = document.getElementById("modal-cart");
    function opencart() {
        modal.style.display = "block";
    }
    function closecart() {
        modal.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    $(document).ready(function () {
        $(".quantity").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#errmsg").html("Chỉ được nhập chữ số!").show().delay(3000).fadeOut("slow 0.4s");
                return false;
            }
        });
    });
   
      

</script>
@endsection