<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'slug', 'description', 'image', 'meta_title', 'meta_keyword', 'meta_description', 'status'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function brands(){
        return $this->hasMany(BrandModel::class)->where('status', '0');
    }
}
