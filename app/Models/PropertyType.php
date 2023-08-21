<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;
    protected $table ="properyType";
    protected $fillable = [
        'name',
        'status',
        'user_id',
    ];
    public function property(){
        return $this->belongsTo(Property::class,'ptype_id','id');
    }

}
