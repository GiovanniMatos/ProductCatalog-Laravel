<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img_url',
        'description',
        'price',
    ];

    
    protected $casts = [
        'price' => 'decimal:2', 
    ];
}