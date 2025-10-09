<?php

use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => 'admin']);
});

it('creates a user', function () {
    $payload = [
        'name' => 'Jan Student',
        'email' => 'jan@studento.test',
        'password' => 'Test1234',
        'role' => 'student',
    ];

    $this->actingAs($this->admin)
        ->post(route('admin.users.store'), $payload)
        ->assertRedirect(route('admin.users.index'));

    expect(User::where('email', $payload['email'])->exists())->toBeTrue();
});

it('updates a user and prevents demoting the last admin', function () {
    $onlyAdmin = $this->admin; // only one admin present
    $this->actingAs($onlyAdmin)
        ->patch(route('admin.users.update', $onlyAdmin), [
            'name' => $onlyAdmin->name,
            'email' => $onlyAdmin->email,
            'role' => 'student',
        ])
        ->assertSessionHasErrors('role');
});

it('prevents deleting self and last admin', function () {
    $this->actingAs($this->admin)
        ->delete(route('admin.users.destroy', $this->admin))
        ->assertSessionHasErrors('delete');

    // Add a second admin, then demote/delete the first should be allowed only if not self
    $otherAdmin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($otherAdmin)
        ->delete(route('admin.users.destroy', $this->admin))
        ->assertRedirect(route('admin.users.index'));
});
