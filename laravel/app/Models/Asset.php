<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'playbook_id',
        'category_id',
        'title',
        'asset_type',
        'content',
        'thumbnail',
        'sort_order',
        'status',
    ];

    /**
     * Get the playbook that owns the asset.
     */
    public function playbook(): BelongsTo
    {
        return $this->belongsTo(Playbook::class);
    }

    /**
     * Get the category that the asset belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
