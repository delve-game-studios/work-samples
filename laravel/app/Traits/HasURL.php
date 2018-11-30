<?php

namespace App\Traits;

trait HasURL
{
    public function getUrlAttribute()
    {
        $model = str_plural(strtolower(substr(strrchr(get_class($this), "\\"), 1)));
        return route("front.{$model}.index", $this->attributes['slug']);
    }
}
