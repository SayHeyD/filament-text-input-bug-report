<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('may sign in the user', function () {
    User::factory()->create([
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    visit('/admin/login')
        ->fill('[id="form.email"]', 'test@example.com')
        ->fill('[id="form.password"]', 'password')
        ->press('button[type="submit"]')
        ->assertSee('Dashboard');
});
