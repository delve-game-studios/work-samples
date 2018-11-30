<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Status
{
    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        return $this->statusLabels[$this->attributes['status']];
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    public function scopePublic(Builder $builder)
    {
        $builder->where('status', '=', self::STATUS_PUBLIC);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    public function scopePrivate(Builder $builder)
    {
        $builder->where('status', '=', self::STATUS_PRIVATE);
    }

    public function isPublic()
    {
        return $this->status == self::STATUS_PUBLIC;
    }

    public function isPrivate()
    {
        return $this->status == self::STATUS_PRIVATE;
    }
}
