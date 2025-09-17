<?php

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('list of job postings', function () {
    $response = $this->get('/api/vacancy-list');

    $response->assertStatus(200);
});
