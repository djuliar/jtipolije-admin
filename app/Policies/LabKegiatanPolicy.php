<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LabKegiatan;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class LabKegiatanPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:LabKegiatan');
    }

    public function view(AuthUser $authUser, LabKegiatan $labKegiatan): bool
    {
        return $authUser->can('View:LabKegiatan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:LabKegiatan');
    }

    public function update(AuthUser $authUser, LabKegiatan $labKegiatan): bool
    {
        return $authUser->can('Update:LabKegiatan');
    }

    public function delete(AuthUser $authUser, LabKegiatan $labKegiatan): bool
    {
        return $authUser->can('Delete:LabKegiatan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:LabKegiatan');
    }

    public function restore(AuthUser $authUser, LabKegiatan $labKegiatan): bool
    {
        return $authUser->can('Restore:LabKegiatan');
    }

    public function forceDelete(AuthUser $authUser, LabKegiatan $labKegiatan): bool
    {
        return $authUser->can('ForceDelete:LabKegiatan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:LabKegiatan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:LabKegiatan');
    }

    public function replicate(AuthUser $authUser, LabKegiatan $labKegiatan): bool
    {
        return $authUser->can('Replicate:LabKegiatan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:LabKegiatan');
    }
}
