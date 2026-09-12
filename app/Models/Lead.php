<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_name',
        'email',
        'phone',
        'source',
        'status',
        'customer_id',
        'notes',
    ];

    /**
     * Lead yang sudah dikonversi
     * terhubung ke Customer.
     */
    public function customer()
    {
        return $this->belongsTo(
            Customer::class,
            'customer_id'
        );
    }
}