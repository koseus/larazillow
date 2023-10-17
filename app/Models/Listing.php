<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['bedrooms', 'bathrooms',
        'area', 'city', 'zipcode', 'street', 'street_num', 'price'];
}
