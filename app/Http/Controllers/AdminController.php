<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use App\Models\TheOrder;
use App\Models\OrderDetail;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function __construct()
    {

    $this->middleware('auth');
           // Phân quyền cho các phương thức
    // $this->middleware()->only([
    //     'createproduct', 'addproduct', 'updateProduct', 'deleteProduct',
    //     'createCategory', 'addCategory', 'updateCategory', 'deleteCategory',
    //     'creategroup', 'addGroup',
    // ]);

    // $this->middleware('checkRole:Admin,User,Customer')->only([
    //     'dashboard', 'productlists', 'productDetail', 'categorylists', 'grouplists'
    // ]);

    }
    public function dashboard()
    {
        return view('admins.dashboard');
    }
    

    // xu ly cac chuc nang cua product
     public function productlists()
     {   
        $products=Product::with(['category','group' ])->paginate(3);
        $categories=Category::all();
        $groups=Group::all();
         return view('admins.products.productlists',compact('products','categories','groups'));
     }
     // chi tiet san pham
        public function productDetail($id_sanpham)
    {  
        

        $product = Product::with(['category', 'group'])->findOrFail($id_sanpham);

        // Trả về view chi tiết sản phẩm
        return view('admins.products.productdetail', compact('product'));
    }
   
        public function createproduct()
    {
        $categories=Category::all();
        $groups=Group::all();
        return view('admins.products.createproduct',compact('categories','groups'));
    }
    // tim kiem san pham
    public function searchProduct(Request $request)
{
    $searching = $request->input('searching');
    $products = Product::with(['category', 'group'])
        ->where('ten_sanpham', 'LIKE', "%{$searching}%")
        ->paginate(3);

    $categories = Category::all();
    $groups = Group::all();

    return view('admins.products.productlists', compact('products', 'categories', 'groups'));
}
   
    public function addproduct(Request $request){
        $request -> validate([
            'ten_sanpham'=>'required',
            'gia_moi'=>'required',
            'gia_cu'=>'required',
            'id_loai_sanpham'=>'required',
            'hinh_sanpham'=>'required|image',
            'thongtin_km'=>'nullable',
            'so_luong'=>'required',
            'id_nhomsp'=>'required',
            
        ]);     
        $filename = null;
        if ($request->hasFile('hinh_sanpham')) {
            $file = $request->file('hinh_sanpham');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('backend/images'), $filename);
        
            // Copy the file to the frontend images directory
            copy(public_path('backend/images/' . $filename), public_path('frontend/images/' . $filename));
        
        }
        Product::create([
            'ten_sanpham'=>$request->ten_sanpham,
            'gia_moi'=>$request->gia_moi,
            'gia_cu'=>$request->gia_cu,
            'id_loai_sanpham'=>$request->id_loai_sanpham,
            'hinh_sanpham'=>$filename,
            'thongtin_km'=>$request->thongtin_km,
            'so_luong'=>$request->so_luong,
            'id_nhomsp'=>$request->id_nhomsp,
        ]);

        return redirect()->route('productlists')->with('success', 'Product created successfully');
    }
    
    // lay thong tin product
    public function getProduct($id_sanpham)
    {
        $product = Product::find($id_sanpham);
        $categories = Category::all();
        $groups = Group::all();
    
        if ($product) {
            return response()->json([
                'success' => true,
                'product' => $product,
                'categories' => $categories,
                'groups' => $groups
            ]);
        } else {
            return response()->json(['success' => false, 'error' => 'Product not found'], 404);
        }
    }
     // cap nhat product

     public function updateProduct(Request $request , $id_sanpham){

        $product = Product::find($id_sanpham);
        if ($product) {
            $product->ten_sanpham = $request->ten_sanpham;
            $product->gia_moi = $request->gia_moi;
            $product->gia_cu = $request->gia_cu;
            $product->id_loai_sanpham = $request->id_loai_sanpham;
            if ($request->hasFile('hinh_sanpham')) {
                // Xóa ảnh cũ nếu có
                if ($product->hinh_sanpham && file_exists(public_path('backend/images/' . $product->hinh_sanpham))) {
                    unlink(public_path('backend/images/' . $product->hinh_sanpham));
                }
                if ($product->hinh_sanpham && file_exists(public_path('frontend/images/' . $product->hinh_sanpham))) {
                    unlink(public_path('frontend/images/' . $product->hinh_sanpham));
                }
    
                // Lưu ảnh mới
                $file = $request->file('hinh_sanpham');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('backend/images'), $filename);
                copy(public_path('backend/images/' . $filename), public_path('frontend/images/' . $filename));
                $product->hinh_sanpham = $filename;
            }
            $product->thongtin_km = $request->thongtin_km;
            $product->so_luong = $request->so_luong;
            $product->id_nhomsp = $request->id_nhomsp;
            $product->save();
            
            return response()->json(['success' => 'Category updated successfully']);
       } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    // xoa product
    public function deleteProduct($id_sanpham)
    {
            $product = Product::find($id_sanpham);
        
            if ($product) {
                $product->delete();
                return response()->json(['success' => 'Product deleted successfully']);
            } else {
                return response()->json(['error' => 'Product not found'], 404);
            }
    }
   
    // xu ly cac chuc nang cua category
    // hien thi danh muc san pham
    public function categorylists()
    {
        $categories=Category::paginate(3);
    
        return view('admins.categories.categorylists',compact('categories'));
    }
    // hien thi view create category

    public function createCategory()
    {
        return view('admins.categories.createcategory');
    }
    // them moi category
        public function addCategory(Request $request){
        $request->validate([
            'id_loaisp' => 'required',
            'tenloaisp' => 'required',
            'anh_loaisp' => 'required|image'
        ]);
        $filename = null;
        if ($request->hasFile('anh_loaisp')) {
            $file = $request->file('anh_loaisp');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('backend/images'), $filename);
        
            // Copy the file to the frontend images directory
            copy(public_path('backend/images/' . $filename), public_path('frontend/images/' . $filename));
        
        }
        Category::create([
            'id_loaisp' => $request->id_loaisp,
            'tenloaisp' => $request->tenloaisp,
            'anh_loaisp' => $filename,
    
        ]);

        return redirect()->route('categorylists')->with('success', 'Category created successfully');
    }
    // xoa category
    public function deleteCategory($id_loaisp)
    {
        $category = Category::where('id_loaisp', $id_loaisp)->first();
        if ($category) {
            $category->delete();
           return response()->json(['success' => 'Category deleted successfully']);
         
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    // lay thong tin category
    public function getCategory($id_loaisp)
    {
        $category = Category::find($id_loaisp);
        
        if ($category) {
            return response()->json([
                'success' => true,
                'category' => $category
            ]);
        } else {
            return response()->json(['success' => false, 'error' => 'Category not found'], 404);
        }
}

 public function updateCategory(Request $request, $id_loaisp)
 {
     $category = Category::find($id_loaisp);
     if ($category) {
         $category->tenloaisp = $request->tenloaisp;
         $category->trangthai = $request->trangthai;
         if ($request->hasFile('anh_loaisp')) {
            // Xóa ảnh cũ nếu có
            if ($category->anh_loaisp && file_exists(public_path('backend/images/' . $category->anh_loaisp))) {
                unlink(public_path('backend/images/' . $category->anh_loaisp));
            }
            if ($category->anh_loaisp && file_exists(public_path('frontend/images/' . $category->anh_loaisp))) {
                unlink(public_path('frontend/images/' . $category->anh_loaisp));
            }

            // Lưu ảnh mới
            $file = $request->file('anh_loaisp');
            $filename =$file->getClientOriginalName();
            $file->move(public_path('backend/images'), $filename);
            copy(public_path('backend/images/' . $filename), public_path('frontend/images/' . $filename));
            $category->anh_loaisp = $filename;
        }

          $category->save();
         return response()->json(['success' => 'Category updated successfully']);
    } else {
        return redirect()->route('categorylists')->with('error', 'Category not found');
     }
 }
 // toggle status
 public function toggleStatus(Request $request, $id_loaisp)
 {
     $category = Category::findOrFail($id_loaisp);
 
     // Thay đổi trạng thái
     $category->trangthai = $category->trangthai === 'Hiện' ? 'Ẩn' : 'Hiện';
     $category->save();
 
     return response()->json([
         'success' => true,
         'trangthai' => $category->trangthai,
     ]);
 }

    // xu ly cac chuc nang cua group
    public function grouplists()
    {
        $groups=Group::paginate(3);
        return view('admins.groups.grouplists',compact('groups'));
    }
    public function creategroup()
    {
        $categories = Category::all();
        return view('admins.groups.creategroup',compact('categories'));
    }
    public function addGroup(Request $request){
        $request->validate([
            'id_nhomsp' => 'required',
            'tennhom' => 'required',
            'id_loaisp' => 'required',
            
        ]);

        Group::create([
            'id_nhomsp' => $request->id_nhomsp,
            'tennhom' => $request->tennhom,
            'id_loaisp' => $request->id_loaisp,
           
        ]);

        return redirect()->route('grouplists')->with('success', 'Group created successfully');
    }
    // delete group
    public function deleteGroup($id_nhomsp){
        $group = Group::where('id_nhomsp', $id_nhomsp)->first();
        if ($group) {
            $group->delete();
          return redirect()->route('grouplists')->with('success', 'Group deleted successfully');
        } else {
            return response()->json(['error' => 'Group not found'], 404);
        }

    }
    // get group 
    public function getGroup($id_nhomsp)
    {
        $group = Group::find($id_nhomsp);
        $categories = Category::all();
        if ($group) {
            return response()->json([
                'success' => true,
                'group' => $group,
                'categories' => $categories
            ]);
        } else {
            return response()->json(['success' => false, 'error' => 'Group not found'], 404);
        }
    }
    // update group
    public function updateGroup(Request $request, $id_nhomsp)
    {
        $group = Group::find($id_nhomsp);
        if ($group) {
            $group->tennhom = $request->tennhom;
            $group->id_loaisp = $request->id_loaisp;
            $group->save();
            return response()->json(['success' => 'Group updated successfully']);
        } else {
            return response()->json(['error' => 'Group not found'], 404);
        }
    }
    // hien thi don hang
    public function orderlists()

    {   $orders = TheOrder::with('orderDetail')->paginate(3);
        return view('admins.order.orderlists',compact('orders'));   
    }
    // xac nhan don hang

    public function confirmOrder($id_donhang)
    {
        $order = TheOrder::findOrFail($id_donhang);
 
     // Thay đổi trạng thái
     $order->trangthai = $order->trangthai === 'Đã xác nhận' ? 'Chờ xác nhận' : 'Đã xác nhận';
     $order->save();
 
     return response()->json([
         'success' => true,
         'trangthai' => $order->trangthai,
     ]);
    }
    // chi tiet don hang
    public function getOrderDetails($id_donhang)
    {
        $order = OrderDetail::with('product')->where('id_donhang', $id_donhang)->get();
        if ($order) {
            return response()->json(['success' => true, 'order' => $order]);
        } else {
            return response()->json(['success' => false, 'error' => 'Order details not found']);
        }
        
    }

   
}
