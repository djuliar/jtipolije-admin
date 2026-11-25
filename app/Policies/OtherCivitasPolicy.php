<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\OtherCivitas;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class OtherCivitasPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:OtherCivitas');
    }

    public function view(AuthUser $authUser, OtherCivitas $otherCivitas): bool
    {
        return $authUser->can('View:OtherCivitas');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:OtherCivitas');
    }

    public function update(AuthUser $authUser, OtherCivitas $otherCivitas): bool
    {
        return $authUser->can('Update:OtherCivitas');
    }

    public function delete(AuthUser $authUser, OtherCivitas $otherCivitas): bool
    {
        return $authUser->can('Delete:OtherCivitas');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:OtherCivitas');
    }

    public function restore(AuthUser $authUser, OtherCivitas $otherCivitas): bool
    {
        return $authUser->can('Restore:OtherCivitas');
    }

    public function forceDelete(AuthUser $authUser, OtherCivitas $otherCivitas): bool
    {
        return $authUser->can('ForceDelete:OtherCivitas');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:OtherCivitas');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:OtherCivitas');
    }

    public function replicate(AuthUser $authUser, OtherCivitas $otherCivitas): bool
    {
        return $authUser->can('Replicate:OtherCivitas');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:OtherCivitas');
    }
}
