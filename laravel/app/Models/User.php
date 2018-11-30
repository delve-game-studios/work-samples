<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean'
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeUnactive(Builder $query)
    {
        return $query->where('active', false);
    }

    public function scopeNotificatable(Builder $query)
    {
        return $query->where('active', true)->join('settings', function(JoinClause $joinClause) {
            $joinClause->on(DB::raw('`settings`.`key`'), '=', DB::raw('CONCAT(`users`.`email`, "_notification")'));
            $joinClause->on(DB::raw('JSON_EXTRACT(`settings`.`value`, "$.state")'), 'LIKE', DB::raw('"true"'));
        });
    }

    public function getCanGetNotificationsAttribute()
    {
        $status = $this->attributes['active'];
        $email = $this->attributes['email'];
        $notification = Setting::get($email . '_notification', ['state' => false]);

        return !!($status && $notification->value['state']);
    }

    public function getStatusAttribute()
    {
        return $this->attributes['active'];
    }
}
