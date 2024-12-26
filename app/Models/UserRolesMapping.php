<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRolesMapping extends Model
{
    use HasFactory;
    protected $table = 'UserRolesMapping';

    protected $primaryKey = 'id';
    protected $fillable = ['userid', 'roleid'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }

    public function role()
    {
        return $this->belongsTo(RoleMaster::class, 'roleid', 'id');
    }
}
