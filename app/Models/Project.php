<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'project_type_id', 'status_id', 'ended_at'];
    protected $cast = ['ended_at' => 'datetime'];

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function warehouse()
    {
        return $this->hasOne(Warehouse::class);
    }
}
