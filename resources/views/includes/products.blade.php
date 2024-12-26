<div class="grid__column-9">  
    <div class="home-filter bg-label-category">
        @if (session('product_group'))
        <span class="home-filter__label bg-label">{{ session('product_group')->tennhom }}</span>
    @endif
        
    </div>
        <div class="home-product bg-white">
            <div class="grid__row">
                <!-- product item -->
                @foreach ($products as $item)
                    <div class="grid__column-2-4">
                        <a href="" class="home-product-item">
                            <div class="product-item__img" style="background-image:url({{asset('frontend/images/'.$item->hinh_sanpham)}});">
                            </div>
                             <h4 class="product-item__name">{{ $item->ten_sanpham }}</h4>
                            <div class="product-item__price">
                                @if ($item->gia_cu != null)
                                    <span class="product-item__price-old">{{ number_format($item->gia_cu, 0, ',', '.') }}₫</span>
                                @endif
                                <span class="product-item__price-new">{{ number_format($item->gia_moi, 0, ',', '.') }}₫</span>
                            </div>
                            <div class="product-item__origin">
                                
                                <span class="product-item__brand">{{ $item->thongtin_km }}</span>
                                <span class="product-item-origin-name">
                                    @if ($item->so_luong > 0)
                                        Còn hàng
                                    @else
                                        Tạm hết hàng
                                    @endif
                                </span>
                            </div>
                        </a>
                        <a href="{{route('orderNow', ['id_sanpham' => $item->id_sanpham])}}" class="buyproduct">
                            CHỌN MUA
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>