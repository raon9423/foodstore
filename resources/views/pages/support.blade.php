@extends('layouts.layout')
@section('title', 'Hỗ trợ - GoFood')
@section('content')
<div class="app__container">

    <div class="grid">
        <div class="contents-help">
            <div class="desc-help">
                <h2>Hướng dẫn mua hàng, thanh toán tại website TMĐT GOFOOD.com  </h2>
                <p><strong>CÁCH 1</strong>: Đặt mua hàng online trên website GoFood.com</p>
                <p>
                    <strong>CÁCH 2</strong>: Gọi điện thoại lên tổng đài 19002309-0795720147 (Cước phí 1.000đ/phút - từ 7:30 - 22:00 kể cả Chủ nhật & ngày lễ) để đặt hàng.
                    Nhân viên chúng tôi luôn sẵn phục vụ, tư vấn và hỗ trợ Quý khách mua được sản phẩm ưng ý.
                </p>
                <p><strong>CÁCH 3</strong>: Để lại bình luận tại bất kì đâu trên website (có thông tin tên, số điện thoại...), hoặc trực tiếp chat với tư vấn viên của công ty.</p>

                <h3>Bước 1: Tìm kiếm sản phẩm cần mua</h3>
                <p> <font color="blue">Truy cập vào website: GOFOOD.com </font> và tìm kiếm sản phẩm cần mua bằng 1 trong 3 cách:</p>
                <P><strong>CÁCH 1</strong>: Tại trang chủ, Khách hàng có thể lựa chọn mua nhanh các sản phẩm giá sốc, giảm giá nhiều.</P>
                <div class="img-help">
                    <img src="{{asset('frontend/images/help1.png')}}" alt="">
                </div>
                <p>
                    <strong>CÁCH 2</strong>: Khách hàng có thể sử dụng thanh tìm kiếm để tìm sản phẩm muốn mua, <strong>GOFOOD.com</strong>sẽ gợi ý cho
                    Khách các sản phẩm gần giống nhất với từ khoá mà Quý khách tìm kiếm.
                </p>

                <div class="img-help">
                    <img src="{{asset('frontend/images/help2.png')}}" alt="">
                </div>
                <p>
                    <strong>CÁCH 3</strong>: Sử dụng Menu nằm ở bên trái để lựa chọn sản phẩm theo nhóm hàng Quý khách cần mua như: Đồ uống,
                    Thực phẩm, Vệ sinh cá nhân, Vệ sinh nhà cửa,...
                </p>
                <div class="img-help">
                    <img src="{{asset('frontend/images/help3.png')}}" alt="">
                </div>
                <h3>Bước 2: Đặt mua sản phẩm</h3>
                <p>
                    Sau khi chọn được sản phẩm cần mua, Quý khách tiến hành đặt mua bằng cách click nút <strong>"Chọn mua" </strong> ngay phía dưới sản phẩm.
                </p>
                <div class="img-help">
                    <img src="{{asset('frontend/images/help4.png')}}" alt="">
                </div>
                <p>Sau khi hoàn tất chọn mua sản phẩm, Quý khách click chọn vào biểu tượng <strong>Giỏ hàng</strong> ở góc phải màn hình</p>
                <div class="img-help">
                    <img src="{{asset('frontend/images/help5.png')}}" alt="">
                </div>
                <p>Tiếp theo click "Xem Giỏ Hàng"</p>
                <div class="img-help">
                    <img src="{{asset('frontend/images/help6.png')}}" alt="">
                </div>
                <p>
                    Kiểm tra lại danh sách sản phẩm vừa đặt xem đã đủ hàng hóa, số lượng cần mua hay chưa. Nếu quý khách cảm thấy
                    hài lòng rồi bấm tiếp nút <strong>"Đặt hàng"</strong>.
                </p>
                <div class="img-help">
                    <img src="{{asset('frontend/images/help7.png')}}" alt="">
                </div>
                <p>
                    Đến bước này là Quý khách đã hoàn tất quá trình đặt hàng. Mặc định thì đơn hàng sẽ được giao theo hình thức COD (nhận hàng và
                    trả tiền trực tiếp).
                    <br>
                    Ngoài ra GoFood cũng hỗ trợ các hình thức thanh toán khác như <strong>
                        cà thẻ tại nhà, trả tiền mặt tại nhà,
                        thanh toán trực tuyến bằng thẻ ATM, Visa, Master Card, JCB, Zalo Pay, MoMo.
                    </strong>
                    <br>
                    Nếu có nhu cầu thì quý khách có thể bấm chọn
                    hình thức thanh toán đó và làm theo hướng dẫn trên màn hình.
                </p>
                <div class="img-help">
                    <img src="{{asset('frontend/images/help8.jpg')}}" alt="">
                </div>
                <p>Sau khi hoàn tất, <strong>GoFood.com </strong> sẽ xác nhận đơn hàng qua tin nhắn SMS và email của Quý khách đã để lại (nếu có).</p>
                <h3>Lưu ý:</h3>
                <p>
                    - <strong>Chúng tôi chỉ chấp nhận những đơn đặt hàng khi cung cấp đủ thông tin</strong> chính xác về địa chỉ, số điện thoại.
                    Sau khi Quý khách đặt hàng, chúng tôi sẽ liên lạc lại để kiểm tra thông tin và thỏa thuận thêm những điều có liên quan (nếu có)
                </p>
                <p>
                    - Một số trường hợp nhạy cảm: <strong>
                        giá trị đơn hàng quá lớn, thời gian giao hàng vào buổi tối, địa chỉ giao hàng trong ngõ ngách
                        hoặc có thể dẫn đến nguy hiểm
                    </strong>. Chúng tôi sẽ chủ động liên lạc với Quý khách để thống nhất lại thời gian giao hàng cụ thể.
                </p>

                <p>
                    - Trong trường hợp giao hàng chậm trễ mà không báo trước, Quý khách có thể không nhận hàng và chúng tôi sẽ hoàn trả
                    toàn bộ số tiền mà Quý khách đã thanh toán trước (nếu có) trong vòng 7 ngày.
                </p>
                <p>
                    - Công ty cam kết tất cả hàng hóa gởi đến Quý khách đều là <strong> hàng chính hãng & mới 100% </strong>(có đầy đủ hóa đơn, được bảo
                    hành chính thức).
                </p>
                <p>
                    - Những rủi ro phát sinh trong quá trình vận chuyển (va đập, ẩm ướt, tai nạn...) có thể ảnh hưởng đến hàng hóa, vì thế xin
                    Quý khách vui lòng kiểm tra hàng hóa thật kỹ trước khi nhận.
                </p>
                <p>- Khi có vấn đề cần phản ánh hoặc khiếu nại, Quý khách có thể liên hệ tổng đài khiếu nại <strong> GOFOO 19002309</strong> để được hỗ trợ.</p>


                <h2 style="text-align: center;">XIN CHÂN THÀNH CẢM ƠN</h2>


            </div>
        </div>
    </div>
</div>
@endsection