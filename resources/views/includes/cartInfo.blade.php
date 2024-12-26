<div class="header__cart">
    <div class="cart-wrap">
        @if (Session::has('Carts'))
            @php
                $temp = Session::get('Carts');
                $count = array_sum(array_column($temp, 'quantity'));
            @endphp
            <i class="cart-icon fas fa-cart-shopping"></i>
            <span class="cart-name">Giỏ hàng</span>
            <span class="cart-notice">{{ $count }}</span>
            <div class="header__cart-list">
                <h4 class="header__cart-heading">
                    Sản phẩm đã thêm
                </h4>
                <ul class="cart-list-item">
                    @foreach ($temp as $cart)
                        <li class="cart-item">
                            <img src="{{ asset('frontend/images/' . $cart->product->hinh_sanpham) }}" alt="" class="cart-img">
                            <div class="cart-item-info">
                                <div class="cart-item-head">
                                    <h5 class="cart-item-name">{{ $cart->product->ten_sanpham }}</h5>
                                    <div class="cart-item-wrap">
                                        <span class="cart-item-price">{{ $cart->product->gia_moi }}₫</span>
                                        <span class="cart-item-multiply">x</span>
                                        <span class="cart-item-qnt">{{ $cart->quantity }}</span>
                                    </div>
                                </div>
                                <div class="cart-item-body">
                                    <span class="cart-item-desc">
                                        Phân loại: {{ $cart->product->group->tennhom }}
                                    </span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="{{route('cartView')}}" class="cart-views btns btn--primary">Xem giỏ hàng</a>
            </div>
        @else
            <i class="cart-icon fas fa-cart-shopping"></i>
            <span class="cart-name">Giỏ hàng</span>
            <span class="cart-notice">0</span>
            <div class="header__cart-list">
                <img src="{{ asset('frontend/images/no-cart-icon.png') }}" alt="" class="cart-no-cart-img">
                {{-- <span class="cart-list-no-cart">
                    Chưa có sản phẩm nào trong giỏ hàng!
                </span> --}}
                <a href="{{route('cartView')}}" class="cart-views btns btn--primary">Xem giỏ hàng</a>
            </div>
        @endif
    </div>
</div>