<?php

namespace App\Models;

 Erlinda
// use Illuminate\Contracts\Auth\MustVerifyEmail;
 main
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
 Erlinda
    /** @use HasFactory<UserFactory> */
 main
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
Erlinda
        'username',
        'password',
        'role',
    ];

    'username',
    'password',
    'role',
];
main

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
Erlinda
            'password' => 'hashed',
            'password' => 'hashed',
 main
        ];
    }

    public function hasRole(string ...$roles): bool
 Erlinda
    {
        return in_array($this->role, $roles, true);
    }

{
    return in_array($this->role, $roles, true);
}

 main
}
