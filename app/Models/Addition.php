<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'house_id'
    ];

    public function house(){
        return $this->belongsTo(House::class); 
    }
}
