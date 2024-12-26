<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;

class BlogController extends Controller
{
    //
     public function blog()

    {
        $blogs = Blog::all();
        foreach ($blogs as $blog) {
            Carbon::setLocale('vi');
            $blog->day = Carbon::parse($blog->created_at)->format('d'); // Ngày
            $blog->month = Carbon::parse($blog->created_at)->translatedFormat('M');
            $blog->year = Carbon::parse($blog->created_at)->format('y'); // Năm (2 chữ số)
        }
        return view('pages.blog',compact('blogs'));
    }
    // hien len home page
    public function getBlogs()
    {
    $blogs = Blog::latest()->take(3)->get(); // Lấy 5 blog mới nhất
    return view('includes.blog_includes', compact('blogs'));
    }
    public function blogDetail( $id)

    {
        $blog = Blog::find($id);
        $mainContent = $blog->mainContent; // Nội dung chính của bài viết
        $paragraphs = explode("\n", $mainContent); // Chia nội dung thành các đoạn nhỏ dựa trên dấu xuống dòng
        return view('pages.blogDetail',compact('blog','paragraphs'));
    }
}
