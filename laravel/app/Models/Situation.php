<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Situation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'journey_id',
        'code',
        'name',
        'slug',
        'description',
        'sort_order',
        'is_active',
    ];

    /**
     * Get the journey that owns the situation.
     */
    public function journey(): BelongsTo
    {
        return $this->belongsTo(Journey::class);
    }
}
