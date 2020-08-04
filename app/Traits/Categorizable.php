<?php
namespace App\Traits;
use Rinvex\Categories\Traits\Categorizable as Category;
use Illuminate\Database\Eloquent\Model;

trait Categorizable
{
    use Category;

    public static function bootCategorizable()
    {
        static::deleted(function (Model $deletedModel) {
            if (method_exists($deletedModel, 'isForceDeleting') && !$deletedModel->isForceDeleting()) {
                return;
            }
            $deletedModel->categories()->detach();
        });
    }
}
