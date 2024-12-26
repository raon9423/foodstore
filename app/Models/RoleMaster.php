<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMaster extends Model
{
    use HasFactory;
    protected $table = 'RoleMaster';
    protected $primaryKey = 'id';

    protected $fillable = [
        'rolename',
    ];

    public function role()
    {
        return $this->hasMany(UserRolesMapping::class, 'roleid', 'id');
    }
}
