<?php
namespace App\Traits;

use App\Observers\LoteObserver;
use App\Observers\ProjectObserver;

/**
 * 
 */
trait MenuTrait
{
    public static function booted()
    {
        static::observe(ProjectObserver::class);
        //static::observe(LoteObserver::class);
    }
}
