<?php

namespace PMEexport\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PMEexport\Traits\Uuids;

class Country extends Model
{
    use SoftDeletes, Uuids;

    public $table = 'countrys';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'nome',
        'sigla'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'uuid',
        'nome',
        'sigla'
    ];

}
