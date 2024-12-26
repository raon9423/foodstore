<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blog;

class HomeController extends Controller
{
    
      public function index()
      {
            $blogs = Blog::latest()->take(3)->get(); // Lấy 5 blog mới nhất
          $products=Product::paginate(10);
          return view('pages.home',compact('products','blogs'));
      }
      // tim kiem san pham 
      public function search(Request $request)
      {
          $searching = $request->input('searching');
          
          // Tìm kiếm sản phẩm
          $products = Product::with(['category', 'group'])
              ->where('ten_sanpham', 'LIKE', "%{$searching}%")
              ->paginate(3);
      
          // Lấy tất cả blogs
          $blogs = Blog::all(); // Lấy toàn bộ blogs từ cơ sở dữ liệu
      
          $categories = Category::all();
          $groups = Group::all();
      
          return view('pages.home', compact('products', 'categories', 'groups', 'blogs'));
      }
      
         
      public function about()
      {
          return view('pages.about');
      }
      public function support()
      {
          return view('pages.support');
      }
   
}
