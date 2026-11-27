<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    // Semua user yang login boleh melihat daftar event
    public function viewAny(User $user)
    {
        return true;
    }

    // Hanya admin yang boleh menambah event
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    // Hanya admin yang boleh mengedit event
    public function update(User $user, Event $event)
    {
        return $user->role === 'admin';
    }

    // Hanya admin yang boleh menghapus event
    public function delete(User $user, Event $event)
    {
        return $user->role === 'admin';
    }
}