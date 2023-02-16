<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Actions\SaveFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'phone',
        'salary',
        'department_id',
        'email',
        'password',
    ];
    protected $appends = ['name','manager'];
    public function getNameAttribute(): string
    {
        return $this->first_name.' '.$this->last_name;
    }
    public function getManagerAttribute()
    {
        return $this->department->manager;
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = app()->call(new SaveFile($value,'users'));
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function setPasswordAttribute($value){
        if ($value){
            $this->attributes['password'] = bcrypt($value);
        }
    }

}
