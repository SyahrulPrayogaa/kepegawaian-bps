<?php

namespace App\Policies;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PegawaiPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->level === 'admin';
    }

    public function view(User $user, Pegawai $pegawai)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Pegawai $pegawai)
    {
        //
    }

    public function delete(User $user, Pegawai $pegawai)
    {
        //
    }

    public function restore(User $user, Pegawai $pegawai)
    {
        //
    }

    public function forceDelete(User $user, Pegawai $pegawai)
    {
        //
    }
}
