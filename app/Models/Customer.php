<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'address',
    ];

    /**
     * Customer memiliki banyak Opportunity.
     */
    public function opportunities()
    {
        return $this->hasMany(
            Opportunity::class,
            'customer_id'
        );
    }
}