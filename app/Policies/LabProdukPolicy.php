<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LabProduk;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class LabProdukPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:LabProduk');
    }

    public function view(AuthUser $authUser, LabProduk $labProduk): bool
    {
        return $authUser->can('View:LabProduk');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:LabProduk');
    }

    public function update(AuthUser $authUser, LabProduk $labProduk): bool
    {
        return $authUser->can('Update:LabProduk');
    }

    public function delete(AuthUser $authUser, LabProduk $labProduk): bool
    {
        return $authUser->can('Delete:LabProduk');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:LabProduk');
    }

    public function restore(AuthUser $authUser, LabProduk $labProduk): bool
    {
        return $authUser->can('Restore:LabProduk');
    }

    public function forceDelete(AuthUser $authUser, LabProduk $labProduk): bool
    {
        return $authUser->can('ForceDelete:LabProduk');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:LabProduk');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:LabProduk');
    }

    public function replicate(AuthUser $authUser, LabProduk $labProduk): bool
    {
        return $authUser->can('Replicate:LabProduk');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:LabProduk');
    }
}
