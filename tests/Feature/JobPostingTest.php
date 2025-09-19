<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('authenticated users can visit the job posting page', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/job-postings')->assertStatus(200);
});

test('User view api vacancy list', function () {

    /** @test */
    $response = $this->withHeaders([
        'Authorization' => 'Bearer '.env('API_TOKEN'),
        'Accept' => 'application/json',
    ])->get('/api/vacancy-list');

    $response->assertStatus(200);
});
