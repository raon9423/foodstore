<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheOrder extends Model
{
    use HasFactory;
    protected $table = 'TheOrder';
    protected $primaryKey = 'id_donhang';
    protected $fillable = [
     'tendonhang',
     'tenkhachhang',
    'diachi',
    'sdt',
    'email',
    'hinhthucthanhtoan',
    'ngaydat',
    'trangthai',

    ];
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'id_donhang', 'id_donhang');
    }
}
