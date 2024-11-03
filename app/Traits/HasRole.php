<?php

namespace App\Traits;

trait HasRole
{
    public function isAdmin(): bool
    {
        return $this->role == self::ADMIN;
    }

    public function isWorker(): bool
    {
        return $this->role == self::WORKER || $this->isAdmin();
    }

    public function getRoleName(): string
    {
        $roleId = (int)$this->role;

        return match ($roleId) {
            self::ADMIN => 'admin',
            self::WORKER => 'worker',
            default => 'unknown'
        };
    }
}
