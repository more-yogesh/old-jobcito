<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tag extends \Spatie\Tags\Tag
{
    public static function findFromSlug(string $slug, string $type = null, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return static::query()
            ->where("slug->{$locale}", $slug)
            ->where('type', $type)
            ->first();
    }
}
