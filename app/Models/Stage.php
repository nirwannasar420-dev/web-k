<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sequence',
    ];

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }
}