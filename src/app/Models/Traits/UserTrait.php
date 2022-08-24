<?php

namespace App\Models\Traits;


use Illuminate\Database\Eloquent\Builder;

trait UserTrait
{
    public function scopeRecent(Builder $query): Builder
    {
        return $query->orderByDesc('created_at');
    }
}
