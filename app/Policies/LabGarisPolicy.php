<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LabGaris;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class LabGarisPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:LabGaris');
    }

    public function view(AuthUser $authUser, LabGaris $labGaris): bool
    {
        return $authUser->can('View:LabGaris');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:LabGaris');
    }

    public function update(AuthUser $authUser, LabGaris $labGaris): bool
    {
        return $authUser->can('Update:LabGaris');
    }

    public function delete(AuthUser $authUser, LabGaris $labGaris): bool
    {
        return $authUser->can('Delete:LabGaris');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:LabGaris');
    }

    public function restore(AuthUser $authUser, LabGaris $labGaris): bool
    {
        return $authUser->can('Restore:LabGaris');
    }

    public function forceDelete(AuthUser $authUser, LabGaris $labGaris): bool
    {
        return $authUser->can('ForceDelete:LabGaris');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:LabGaris');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:LabGaris');
    }

    public function replicate(AuthUser $authUser, LabGaris $labGaris): bool
    {
        return $authUser->can('Replicate:LabGaris');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:LabGaris');
    }
}
