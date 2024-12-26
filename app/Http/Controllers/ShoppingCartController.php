<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\TheOrder;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ShoppingCartController extends Controller
{
    // khởi tạo biến strCart để lưu trữ giỏ hàng
    private $strCart = 'Carts';

    // hàm trả về trang giỏ hàng
    public function cartView()  {
        return view('pages.cartView');
    }

    // thêm sản phẩm vào giỏ hàng
    public function orderNow($id_sanpham)
    {
        // kiểm tra xem id sản phẩm có tồn tại không
        if (!$id_sanpham) {
            return response()->json(['status' => 0, 'message' => 'Product ID is required']);
        }
        // lấy giỏ hàng từ session
        $cart = Session::get($this->strCart, []);
        $product = Product::find($id_sanpham);
        if (!$product) {
            return response()->json(['status' => 0, 'message' => 'Product not found']);
        }
        // kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $existingIndex = $this->isExistingCheck($id_sanpham);
        if ($existingIndex === -1) {
            $cart[] = new Cart($product, 1);
        } else {
            $cart[$existingIndex]->quantity++;
        }
        // lưu giỏ hàng vào session
        Session::put($this->strCart, $cart);
        return redirect()->route('cartView')->with('success', 'Product added to cart successfully');
    }

    // hàm kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
    private function isExistingCheck($id_sanpham)
    {
        // lấy giỏ hàng từ session
        $cart = Session::get($this->strCart, []);
        // duyệt qua từng sản phẩm trong giỏ hàng
        // nếu sản phẩm đã tồn tại thì trả về index của sản phẩm đó trong giỏ hàng
        foreach ($cart as $index => $item) {
            if ($item->product->id_sanpham == $id_sanpham) {
                return $index;
            }
        }
        return -1;
    }

    // hàm xóa sản phẩm khỏi giỏ hàng
    public function removeItem($id_sanpham){
       // kiểm tra xem id sản phẩm có tồn tại không
       // nếu không tồn tại thì trả về thông báo lỗi
        if (!$id_sanpham) {
            return response()->json(['status' => 0, 'message' => '404']);
        }
        // lấy giỏ hàng từ session
        $cart = Session::get($this->strCart, []);
        $existingIndex = $this->isExistingCheck($id_sanpham);
        // kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        // nếu sản phẩm đã tồn tại thì xóa sản phẩm đó khỏi giỏ hàng
        if ($existingIndex !== -1) {
            unset($cart[$existingIndex]);
            $cart = array_values($cart); // reset index
        }
        // kiểm tra xem giỏ hàng có rỗng không
        // nếu rỗng thì xóa giỏ hàng khỏi session
        if(empty($cart)){
            Session::forget($this->strCart);
        }
        // nếu không rỗng thì lưu giỏ hàng vào session
        else{
            Session::put($this->strCart, $cart);
        }
        return redirect()->route('cartView')->with('success', 'Product removed from cart successfully');
    }

    // xóa hết sản phẩm khỏi giỏ hàng
    public function clearCart(){
        // xóa giỏ hàng khỏi session
        Session::forget($this->strCart);
        return redirect()->route('cartView')->with('success', 'Cart cleared successfully');
    }
    
    // cập nhật giỏ hàng
    public function updateCart(Request $request){
        
        $quanties = $request->input('quantity'); // lấy danh sách số lượng sản phẩm từ form
        $cart = Session::get($this->strCart, []); // lấy giỏ hàng từ session
        // duyệt qua từng sản phẩm trong giỏ hàng
        foreach($cart as $index => $item){
          // kiểm tra xem chỉ số có tồn tại trong mảng $quantities hay không
     
        // cập nhật số lượng sản phẩm
        $newQuantity = (int)$quanties[$index]; // lấy số lượng sản phẩm từ danh sách số lượng sản phẩm
        $product = Product::find($item->product->id_sanpham); // lấy sản phẩm từ database
        // kiểm tra số lượng sản phẩm có đủ không
        if($newQuantity > $product->so_luong){
                return redirect()->route('cartView')->with('error', "Sản phẩm {$product->ten_sanpham} không đủ số lượng. Chỉ còn {$product->so_luong} sản phẩm có sẵn.");
        }
        
        // nếu số lượng sản phẩm bằng 0 thì xóa sản phẩm đó khỏi giỏ hàng
        if($newQuantity <= 0){
            
            unset($cart[$index]); // xóa sản phẩm khỏi giỏ hàng
            $cart = array_values($cart); // reset index của giỏ hàng
            continue; // reset index
        }
            $cart[$index]->quantity = $newQuantity; // cập nhật số lượng sản phẩm
        }
        // lưu giỏ hàng vào session
        if (empty($cart)) {
            Session::forget($this->strCart);
        } else {
            // lưu giỏ hàng vào session
            Session::put($this->strCart, $cart);
        }
        return redirect()->route('cartView')->with('success','Cập nhật giỏ hảng thành công');
    }

    // thanh toán giỏ hàng
    public function checkOut(){
        return view('pages.checkout');
    }

    // xử lý đơn hàng
    public function processOrder(Request $request){

        $cart = Session::get($this->strCart, []); // lấy giỏ hàng từ session
        $numberofOrders = TheOrder::count(); // đếm số lượng đơn hàng
        $order = new TheOrder(); // khởi tạo đơn hàng mới
        $order->tendonhang = 'Đơn hàng số ' . ($numberofOrders + 1); // tạo tên đơn hàng
        $order->tenkhachhang = $request->input('tenkhachhang'); // lấy tên khách hàng từ form
        $order->diachi = $request->input('diachi'); // lấy địa chỉ từ form
        $order->sdt = $request->input('sdt'); // lấy số điện thoại từ form
        $order->email = $request->input('email'); // lấy email từ form
        $order->hinhthucthanhtoan = $request->input('hinhthucthanhtoan'); // lấy hình thức thanh toán từ form
        $order->ngaydat = Carbon::now('Asia/Ho_Chi_Minh'); // lấy ngày đặt hàng format giờ Việt Nam
        $order->trangthai; // trạng thái đơn hàng
        $order->save(); // lưu đơn hàng vào database
        // duyệt qua từng sản phẩm trong giỏ hàng
        foreach($cart as $item){
            $orderDetail = new OrderDetail(); // khởi tạo chi tiết đơn hàng
            $orderDetail->id_donhang = $order->id_donhang; // lấy id đơn hàng
            $orderDetail->id_sanpham = $item->product->id_sanpham; // lấy id sản phẩm
            $orderDetail->thanhtien = $item->product->gia_moi; // lấy đơn giá sản phẩm
            $orderDetail->soluong = $item->quantity; // lấy số lượng sản phẩm
            $orderDetail->save(); // lưu chi tiết đơn hàng vào database
        }
        // xóa giỏ hàng khỏi session
        Session::forget($this->strCart);
        return redirect()->route('home')->with('success', 'Đặt hàng thành công');
    }
    // tích hợp thanh toán bằng ZaloPay
    public function payWithZaloPay(Request $request)
    {
        $config = [
            "app_id" => 2554,
            "key1" => "sdngKKJmqEMzvh5QQcdD2A9XBSKUNaYn",
            "key2" => "trMrHtvjo6myautxDUiAcYsVtaeQ8nhf",
            "endpoint" => "https://sb-openapi.zalopay.vn/v2/create",
            'query_status_url' => 'https://sb-openapi.zalopay.vn/v2/query',
            'refund_url' => 'https://sb-openapi.zalopay.vn/v2/refund',
            'query_refund_url' => 'https://sb-openapi.zalopay.vn/v2/query_refund',
        ];

        $embeddata = '{}'; // Merchant's data
        $items = '[]'; // Merchant's data
        $transID = rand(0,1000000); //Random trans id
        $order = [
            "app_id" => $config["app_id"],
            "app_time" => round(microtime(true) * 1000), // miliseconds
            "app_trans_id" => date("ymd") . "_" . $transID, // translation missing: vi.docs.shared.sample_code.comments.app_trans_id
            "app_user" => "user123",
            "item" => $items,
            "embed_data" => $embeddata,
            "amount" => 1000,
            "description" => "Lazada - Payment for the order #$transID",
            "bank_code" => "zalopayapp"
        ];

        $data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"]
        . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
        $order["mac"] = hash_hmac("sha256", $data, $config["key1"]);    

        $context = stream_context_create([
            "http" => [
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($order)
            ]
        ]);

        $resp = file_get_contents($config["endpoint"], false, $context);
        $result = json_decode($resp, true);

        return response()->json($result);
    }
    // Xử lý callback từ ZaloPay
    public function handleCallback(Request $request){
        $config = config('zalopay');
        $postdata = $request->getContent();
        $postdatajson = json_decode($postdata, true);

        $mac = hash_hmac("sha256", $postdatajson["data"], $config['key2']);
        $requestmac = $postdatajson["mac"];

        if (strcmp($mac, $requestmac) != 0) {
            return response()->json([
                "return_code" => -1,
                "return_message" => "mac not equal"
            ]);
        }

        $datajson = json_decode($postdatajson["data"], true);
        // Cập nhật trạng thái đơn hàng dựa trên $datajson['app_trans_id']

        return response()->json([
            "return_code" => 1,
            "return_message" => "success"
        ]);
    }
    // Hàm gọi API truy vấn trạng thái đơn hàng
    public function queryOrder(Request $request)
    {
        $config = config('zalopay');
        $app_trans_id = $request->app_trans_id; // Truyền từ client

        $data = $config['app_id'] . "|" . $app_trans_id . "|" . $config['key1'];
        $params = [
            "app_id" => $config['app_id'],
            "app_trans_id" => $app_trans_id,
            "mac" => hash_hmac("sha256", $data, $config['key1'])
        ];

        // $response = Http::post($config['query_status_url'], $params);
        // return response()->json($response->json());
    }
    // Hàm gọi API hoàn tiền
    public function refundOrder(Request $request)
    {
        $config = config('zalopay');
        $timestamp = round(microtime(true) * 1000);

        $params = [
            "app_id" => $config['app_id'],
            "m_refund_id" => date("ymd") . "_" . $config['app_id'] . "_" . $timestamp,
            "timestamp" => $timestamp,
            "zp_trans_id" => $request->zp_trans_id, // Truyền từ client
            "amount" => $request->amount, // Số tiền cần hoàn lại
            "description" => $request->description,
            "mac" => ''
        ];

        $data = implode('|', [
            $params['app_id'],
            $params['zp_trans_id'],
            $params['amount'],
            $params['description'],
            $params['timestamp']
        ]);
        $params['mac'] = hash_hmac("sha256", $data, $config['key1']);

        // $response = Http::post($config['refund_url'], $params);
        // return response()->json($response->json());
    }
    // Hàm gọi API truy vấn trạng thái hoàn tiền
    public function queryRefund(Request $request)
    {
        $config = config('zalopay');
        $timestamp = round(microtime(true) * 1000);

        $data = $config['app_id'] . "|" . $request->m_refund_id . "|" . $timestamp;
        $params = [
            "app_id" => $config['app_id'],
            "m_refund_id" => $request->m_refund_id,
            "timestamp" => $timestamp,
            "mac" => hash_hmac("sha256", $data, $config['key1'])
        ];
        // $response = Http::post($config['query_refund_url'], $params);
        // return response()->json($response->json());
    }
    // Hàm gọi API truy vấn trạng thái đơn hàng
    // public function refund(Request $request){
    //     $config = config('zalopay');    
    //     $timestamp = round(microtime(true) *1000);
    //     $data = $config[''] .'|'.
    //     $request->m_refund_id . amount . amount . $timestamp;
    //     $params = [
    //         "app_id" => $config['app_id'],
    //         "m_refund_id" => $request->m_refund_id,
    //         "amount" => $request->amount,
    //         "description" => $request->description,
    //         "timestamp" => $timestamp,
    //         "mac" => hash_hmac("sha256", $data, $config['key1'])
    //     ];
    //     // $response = Http::post($config['refund_url'], $params);
    //     // return response()->json($response->json());
    // }
}