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
        'type_leave',
        'reason'
    ];

    public function leave_type(): BelongsTo
    {
        return $this->belongsTo(LeaveTypes::class);
    }
}
