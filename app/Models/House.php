<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'preview',
        'category_id',
        'price',
        'address',
        'small_description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    } 

    public function images()
    {
        return $this->hasMany(Image::class); 
    }

    public function houseUsers()
    {
        return $this->hasMany(HouseUser::class); 
    }

    public function features()
    {
        return $this->hasMany(Feature::class); 
    }

    public function getPreviewImagePath(): string
    {

        return asset(Storage::url($this->preview));

    }
}
