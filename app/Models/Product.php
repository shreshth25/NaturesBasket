<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','image','price','stock','category_id','created_by_id','updated_by_id'];
    protected $with = ['getCategory'];
    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
