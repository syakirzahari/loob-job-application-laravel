<?php

use App\Models\Job\JobPosting;
use App\Models\Ref\Status;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('authenticated users can visit the application page', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/applications')->assertStatus(200);
});

test('Check user status application', function () {
    $response = $this->withHeaders([
        'Authorization' => 'Bearer '.env('API_TOKEN'),
        'Accept' => 'application/json',
    ])->post('/api/application/check', ['keyword' => 'applicant@gmail.com']);

    $response->assertStatus(200);
});

test('store user application', function () {
    $job = JobPosting::factory()->create();
    $status = Status::factory()->create(['id' => 2]);

    $response = $this->withHeaders([
        'Authorization' => 'Bearer '.env('API_TOKEN'),
        'Accept' => 'application/json',
    ])->post('/api/application/store', [
        'applicant_name' => 'applicant test',
        'applicant_email' => 'applicanttest@gmail.com',
        'applicant_phone' => '08123456789',
        'description' => 'Testing description',
        'status_id' => $status->id,
        'salary' => '8000',
        'job_posting_id' => $job->id,
    ]);

    $response->assertStatus(200);
});
