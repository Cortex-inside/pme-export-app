<?php

namespace PMEexport\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use PMEexport\Notifications\CustomResetPassword;
use PMEexport\Traits\Uuids;

class User extends Authenticatable
{
    use Notifiable, HasRoles, Uuids, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','company_id','department_id','cpf'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\PMEexport\Models\Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function departamento()
    {
        return $this->belongsTo(\PMEexport\Models\Department::class, 'department_id');
    }

    public function tipoUser()
    {
        if ($this->roles[0]->id == 8) {
            $compost = explode("_", $this->roles[0]->name);
            return ucwords(strtolower($compost[0] . " " . $compost[1]));
        } else {
            return ucwords(strtolower($this->roles[0]->name));
        }
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword(['token'=>$token,'first_name'=>$this->name]));
    }
}
