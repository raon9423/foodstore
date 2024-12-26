<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'product';
    protected $primaryKey = 'id_sanpham';
    protected $fillable = [
        'ten_sanpham',
        'gia_moi',
        'gia_cu',
        'id_loai_sanpham',
        'hinh_sanpham',
        'thongtin_km',
        'so_luong',
        'id_nhomsp',
       
    ];
   
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_loai_sanpham', 'id_loaisp');
    }
        public function group()
    {
        return $this->belongsTo(Group::class, 'id_nhomsp', 'id_nhomsp');
    }
    
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'id_sanpham', 'id_sanpham');
    }


}
