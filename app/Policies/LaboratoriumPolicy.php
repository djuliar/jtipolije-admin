<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Laboratorium;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class LaboratoriumPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Laboratorium');
    }

    public function view(AuthUser $authUser, Laboratorium $laboratorium): bool
    {
        return $authUser->can('View:Laboratorium');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Laboratorium');
    }

    public function update(AuthUser $authUser, Laboratorium $laboratorium): bool
    {
        return $authUser->can('Update:Laboratorium');
    }

    public function delete(AuthUser $authUser, Laboratorium $laboratorium): bool
    {
        return $authUser->can('Delete:Laboratorium');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Laboratorium');
    }

    public function restore(AuthUser $authUser, Laboratorium $laboratorium): bool
    {
        return $authUser->can('Restore:Laboratorium');
    }

    public function forceDelete(AuthUser $authUser, Laboratorium $laboratorium): bool
    {
        return $authUser->can('ForceDelete:Laboratorium');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Laboratorium');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Laboratorium');
    }

    public function replicate(AuthUser $authUser, Laboratorium $laboratorium): bool
    {
        return $authUser->can('Replicate:Laboratorium');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Laboratorium');
    }
}
