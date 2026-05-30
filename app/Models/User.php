<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use Notifiable;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'name',
        'nama',
        'email',
        'password',
        'no_hp',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function sewa()
    {
        return $this->hasMany(Sewa::class, 'id_user');
    }

    public function getNameAttribute()
    {
        return $this->attributes['nama'] ?? null;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['nama'] = $value;
    }
}