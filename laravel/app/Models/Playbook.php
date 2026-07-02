<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Playbook extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'situation_id',
        'code',
        'title',
        'objective',
        'sort_order',
        'is_active',
    ];

    /**
     * Get the situation that owns the playbook.
     */
    public function situation(): BelongsTo
    {
        return $this->belongsTo(Situation::class);
    }
}
