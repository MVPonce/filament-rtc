<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'stock', 'measure_id', 'category_id', 'condition_id'];

    public function measure(){
        return $this->belongsTo(Measure::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function condition(){
        return $this->belongsTo(Condition::class);
    }
}
