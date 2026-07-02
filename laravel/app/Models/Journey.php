<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journey extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_id',
        'name',
        'slug',
        'description',
        'sort_order',
        'status',
    ];

    /**
     * Get the product that owns the journey.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
