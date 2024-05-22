<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Variant;

class Product extends Model
{
    use HasFactory;
    public function variants() {
        return $this->hasMany(Variant::class);
    }
}
