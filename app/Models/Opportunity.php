<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'salesperson_id',
        'stage_id',
        'name',
        'expected_revenue',
        'rating',
        'opportunity_date',
        'notes',
    ];

    protected $casts = [
        'expected_revenue' => 'decimal:2',
        'rating' => 'integer',
        'opportunity_date' => 'date',
    ];

    /**
     * Customer associated with this opportunity.
     */
    public function customer()
    {
        return $this->belongsTo(
            Customer::class,
            'customer_id'
        );
    }

    /**
     * Salesperson responsible for this opportunity.
     */
    public function salesperson()
    {
        return $this->belongsTo(
            User::class,
            'salesperson_id'
        );
    }

    /**
     * Stage of this opportunity.
     */
    public function stage()
    {
        return $this->belongsTo(
            Stage::class,
            'stage_id'
        );
    }

    /**
     * Activities associated with this opportunity.
     */
    public function activities()
    {
        return $this->hasMany(
            Activity::class,
            'opportunity_id'
        );
    }

    /**
     * Products associated with this opportunity.
     */
    public function items()
    {
        return $this->hasMany(
            OpportunityItem::class,
            'opportunity_id'
        );
    }
}