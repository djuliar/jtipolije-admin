<?php

namespace Tests\Feature;

use App\Filament\Resources\Users\Pages\ManageUsers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_user(): void
    {
        $this->actingAs(User::factory()->create());
        $roles = collect(['editor', 'manager'])->map(fn (string $name): Role => Role::query()->create([
            'name' => $name,
            'guard_name' => 'web',
        ]));

        Livewire::test(ManageUsers::class)
            ->callAction('create', data: [
                'name' => 'Admin User',
                'email' => 'new-user@example.com',
                'password' => 'secure-password',
                'roles' => $roles->pluck('id')->all(),
            ])
            ->assertHasNoActionErrors();

        $user = User::query()->where('email', 'new-user@example.com')->firstOrFail();

        $this->assertDatabaseHas('users', [
            'name' => 'Admin User',
            'email' => 'new-user@example.com',
        ]);
        $this->assertEqualsCanonicalizing($roles->pluck('id')->all(), $user->roles->modelKeys());
    }
}
