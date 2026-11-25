<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LabDokumen;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class LabDokumenPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:LabDokumen');
    }

    public function view(AuthUser $authUser, LabDokumen $labDokumen): bool
    {
        return $authUser->can('View:LabDokumen');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:LabDokumen');
    }

    public function update(AuthUser $authUser, LabDokumen $labDokumen): bool
    {
        return $authUser->can('Update:LabDokumen');
    }

    public function delete(AuthUser $authUser, LabDokumen $labDokumen): bool
    {
        return $authUser->can('Delete:LabDokumen');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:LabDokumen');
    }

    public function restore(AuthUser $authUser, LabDokumen $labDokumen): bool
    {
        return $authUser->can('Restore:LabDokumen');
    }

    public function forceDelete(AuthUser $authUser, LabDokumen $labDokumen): bool
    {
        return $authUser->can('ForceDelete:LabDokumen');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:LabDokumen');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:LabDokumen');
    }

    public function replicate(AuthUser $authUser, LabDokumen $labDokumen): bool
    {
        return $authUser->can('Replicate:LabDokumen');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:LabDokumen');
    }
}
