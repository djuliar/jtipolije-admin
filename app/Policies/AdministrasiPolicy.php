<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Administrasi;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class AdministrasiPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Administrasi');
    }

    public function view(AuthUser $authUser, Administrasi $administrasi): bool
    {
        return $authUser->can('View:Administrasi');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Administrasi');
    }

    public function update(AuthUser $authUser, Administrasi $administrasi): bool
    {
        return $authUser->can('Update:Administrasi');
    }

    public function delete(AuthUser $authUser, Administrasi $administrasi): bool
    {
        return $authUser->can('Delete:Administrasi');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Administrasi');
    }

    public function restore(AuthUser $authUser, Administrasi $administrasi): bool
    {
        return $authUser->can('Restore:Administrasi');
    }

    public function forceDelete(AuthUser $authUser, Administrasi $administrasi): bool
    {
        return $authUser->can('ForceDelete:Administrasi');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Administrasi');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Administrasi');
    }

    public function replicate(AuthUser $authUser, Administrasi $administrasi): bool
    {
        return $authUser->can('Replicate:Administrasi');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Administrasi');
    }
}
