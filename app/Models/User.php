<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'visitor_purpose',
        'role',
        'permissions',
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
            'permissions' => 'array',
        ];
    }

    // Membatasi hanya role admin (admin_1, admin_2, admin) yang bisa masuk Filament Dashboard
    public function canAccessPanel(Panel $panel): bool
    {
        return in_array(trim($this->role), ['admin', 'admin_1', 'admin_2'], true);
    }

    public function isAdmin1(): bool
    {
        return in_array(trim($this->role), ['admin', 'admin_1'], true);
    }

    public function isAdmin2(): bool
    {
        return trim($this->role) === 'admin_2';
    }

    public function isVisitor(): bool
    {
        return trim($this->role) === 'visitor';
    }

    public function hasPermission(string $featureKey): bool
    {
        if ($this->isAdmin1()) {
            return true;
        }

        if ($this->isAdmin2()) {
            $perms = $this->permissions ?? [];
            return in_array($featureKey, $perms, true);
        }

        return false;
    }
}