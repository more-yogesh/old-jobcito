<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends \Rinvex\Categories\Models\Category
{
    protected $cacheLifetime = 0;
}
