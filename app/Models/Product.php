<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'product_name',
        'unit',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function opportunityItems(): HasMany
    {
        return $this->hasMany(OpportunityItem::class, 'product_id');
    }
}
