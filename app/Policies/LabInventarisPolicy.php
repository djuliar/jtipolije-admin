<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LabInventaris;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class LabInventarisPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:LabInventaris');
    }

    public function view(AuthUser $authUser, LabInventaris $labInventaris): bool
    {
        return $authUser->can('View:LabInventaris');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:LabInventaris');
    }

    public function update(AuthUser $authUser, LabInventaris $labInventaris): bool
    {
        return $authUser->can('Update:LabInventaris');
    }

    public function delete(AuthUser $authUser, LabInventaris $labInventaris): bool
    {
        return $authUser->can('Delete:LabInventaris');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:LabInventaris');
    }

    public function restore(AuthUser $authUser, LabInventaris $labInventaris): bool
    {
        return $authUser->can('Restore:LabInventaris');
    }

    public function forceDelete(AuthUser $authUser, LabInventaris $labInventaris): bool
    {
        return $authUser->can('ForceDelete:LabInventaris');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:LabInventaris');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:LabInventaris');
    }

    public function replicate(AuthUser $authUser, LabInventaris $labInventaris): bool
    {
        return $authUser->can('Replicate:LabInventaris');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:LabInventaris');
    }
}
