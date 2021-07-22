<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ColumnFillable;

class Product extends Model
{
    // use HasFactory;
    // protected $fillable = ['name','sku'];
    use ColumnFillable;



    protected $casts = [
        'category' => 'array',
        'subcategory' => 'array',
    ];
}
