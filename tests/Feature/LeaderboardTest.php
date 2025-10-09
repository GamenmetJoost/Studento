<?php

use App\Models\User;

it('shows leaderboard for authenticated users', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->get(route('leaderboard'))
        ->assertOk();
});
