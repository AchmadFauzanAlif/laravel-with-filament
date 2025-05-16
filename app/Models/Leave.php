<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'reason',
        'type_leave_id'
    ];

    public function leave_type(): BelongsTo
    {
        return $this->belongsTo(LeaveTypes::class, 'type_leave_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo((User::class));
    }
}
