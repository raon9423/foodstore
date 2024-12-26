<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id_loaisp'; // Đặt id_loaisp làm khóa chính
    public $incrementing = false; // Nếu id_loaisp không phải kiểu số tự động tăng
    protected $keyType = 'string'; // Đặt kiểu dữ liệu nếu id_loaisp là chuỗi
    
    protected $fillable = [
        'id_loaisp',
        'tenloaisp',
        'anh_loaisp',
        'trangthai',
     
    ];

    public function group()
    {
        return $this->hasMany(Group::class, 'id_loaisp', 'id_loaisp');
    }
    
    public function product()
    {
        return $this->hasMany(Product::class, 'id_loaisp', 'id_loai_sanpham');
    }
}
