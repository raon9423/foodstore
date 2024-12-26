<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'group';

    protected $primaryKey = 'id_nhomsp';

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id_nhomsp',
        'id_loaisp',
        'tennhom',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_loaisp', 'id_loaisp');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'id_nhomsp', 'id_nhomsp');
    }
}
