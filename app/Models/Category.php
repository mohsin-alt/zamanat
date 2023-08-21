<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ="categories";
    protected $fillable =[
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'image',
        
    ];

    public function properties(){
        return $this->hasManyThrough(Properties::class,Category::class,'id','cate_id');
    }
}
