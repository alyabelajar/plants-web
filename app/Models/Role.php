<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guard_web'];

    protected static function booted()
    {
        static::creating(function ($role) {
            $role->guard_name = config('auth.defaults.guard');
        });
    }


}
