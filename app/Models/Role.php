<?php

namespace PMEexport\Models;

use Eloquent as Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Role extends Model implements Transformable
{
    use TransformableTrait;

    public $timestamps = false;
    protected $table = "roles";
    protected $fillable = [
        'id',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
