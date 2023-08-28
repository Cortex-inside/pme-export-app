<?php
/**
 * Created by PhpStorm.
 * User: guilhermedias
 * Date: 14/08/18
 * Time: 09:37
 */

namespace PMEexport\Traits;

use Webpatser\Uuid\Uuid;

trait Uuids
{

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Uuid::generate()->string;
        });
    }
}