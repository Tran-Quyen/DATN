<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'brands';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'slug', 'status', 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
