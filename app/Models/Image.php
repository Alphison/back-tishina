<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id'
    ];

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function getImagePath(): string
    {

        return asset(Storage::url($this->src));

    }
}
