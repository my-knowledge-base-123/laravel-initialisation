<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasUser
{
    use HasRelationships;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
