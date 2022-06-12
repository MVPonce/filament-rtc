<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function users(){
        return $this->morphedByMany(User::class, 'roleable');
    }
    public function permissions(){
        return $this->morphedByMany(Permission::class, 'roleable');
    }
}
