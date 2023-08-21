<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table ="properties";
    protected $fillable =[
        'name',
        'cate_id',
        'slug',
        'small_description',
        'original_price',
        'selling_price',
        'description',
        'status',
        'popular',
        'image',
        'tax',
        'qty',
        'embed_video',
        'agent_id',
        'client_id',
        
        
    ];
    public function category(){
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
