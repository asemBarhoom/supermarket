<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const FR1_TYPE = 'FR1';
    const SR1_TYPE = 'SR1';
    const CF1_TYPE = 'CF1';

    protected $guarded = [];
}
