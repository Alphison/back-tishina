<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id'
    ];

    public function getIconImagePath(): string
    {

        return asset(Storage::url($this->icon));

    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
