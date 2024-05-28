<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Variant;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rocessor',
        'memory',
        'storage',
        'price',
    ];
    
}
