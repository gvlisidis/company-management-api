<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserHoliday extends Model
{
    use HasFactory;

    const PENDING = 1;
    const APPROVED = 2;
    const REJECTED = 3;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = ['start_date', 'end_date', 'approved_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', self::APPROVED);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::PENDING);
    }
}
