<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    use HasFactory;
    protected $table = 'links';
    protected $fillable = [
        'name',
        'links',
        'category',
        'isMobile',
        'image_path',
        '_group',
        'status',
        'order_number',
        'description'
    ];
}
