<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'OrderDetail';
   
   protected $fillable = [
        'id_donhang',
        'id_sanpham',
        'thanhtien',
        'soluong',
        
    ];
    public function theOrder()
    {
        return $this->belongsTo(TheOrder::class, 'id_donhang', 'id_donhang');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_sanpham', 'id_sanpham');
    }
}
