<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['name','price','discount','quantity','brand_id','category_id','img','created_at','updated_at','deleted_at'];



    public function category(){

        return $this->belongsTo(Category::class,'category_id');
    }

    public function brand(){

        return $this->belongsTo(Brand::class,'brand_id');
    }
}