<?php

namespace App\Models;

use App\DTO\UserDTO;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticated;
use Illuminate\Notifications\Notifiable;

/*** @method static create(array $userDTO) */
class User extends Authenticated
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function projects() : HasMany
    {
        return $this->hasMany(Project::class);
    }
}
