<?php

use App\Models\User;

it('denies non-admins from admin area', function () {
    $student = User::factory()->create(['role' => 'student']);
    $this->actingAs($student)->get('/admin')->assertStatus(403);
});

it('allows admins into admin area', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin)->get('/admin')->assertOk();
});
