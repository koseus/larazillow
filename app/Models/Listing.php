<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['bedrooms', 'bathrooms',
        'area', 'city', 'zipcode', 'street', 'street_num', 'price'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'by_user_id'
        );
    }

    public function scopeMostRecent(Builder $query): Builder
    {
        return $query->orderByDesc('created_at');
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['priceFrom'] ?? false,
            fn ($query, $value) => $query->where('price', '>=', $value)
        )->when(
            $filters['priceUpTo'] ?? false,
            fn ($query, $value) => $query->where('price', '<=', $value)
        )->when(
            $filters['numBedrooms'] ?? false,
            fn ($query, $value) => $query->where('bedrooms', (int)$value < 6 ? '=' : '>=', $value)
        )->when(
            $filters['numBathrooms'] ?? false,
            fn ($query, $value) => $query->where('bathrooms', (int)$value < 6 ? '=' : '>=', $value)
        )->when(
            $filters['areaFrom'] ?? false,
            fn ($query, $value) => $query->where('area', '>=', $value)
        )->when(
            $filters['areaUpTo'] ?? false,
            fn ($query, $value) => $query->where('area', '<=', $value)
        );
    }
}
