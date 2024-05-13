<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'preview',
        'category_id',
        'price'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    } 
}
