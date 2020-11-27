<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'document_number',
        'phone_number',
        'country'
    ];

    protected static function boot() {
    
        parent::boot();
    
        static::deleted(function ($user) {
          $user->usersLogs()->delete();
        });
    }

    public function usersLogs()
    {
        return $this->hasMany('App\Models\UsersLogs', 'user_id');
    }

}
