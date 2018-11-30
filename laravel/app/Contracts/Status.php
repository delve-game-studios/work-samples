<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface Status
{
    const STATUS_PRIVATE = 0;
    const STATUS_PUBLIC = 1;

    /**
     * @return string
     */
    public function getStatusLabelAttribute();

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    public function scopePublic(Builder $builder);

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    public function scopePrivate(Builder $builder);
}
