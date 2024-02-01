<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'article',
        'name',
        'status',
        'data',
    ];

    public function scopeAvailable(Builder $query): void
    {
        $query->where('status','=', 'available');
    }
}
