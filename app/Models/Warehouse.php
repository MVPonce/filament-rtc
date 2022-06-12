<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'total_capability', 'used_capability', 'project_id', 'status_id', 'closed_at'];
    protected $cast = ['closed_at', 'datetime'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
