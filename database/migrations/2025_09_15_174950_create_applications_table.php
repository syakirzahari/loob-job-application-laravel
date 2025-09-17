<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('reference_no');
            $table->foreignUlid('user_id')->nullable()->constrained('users');
            $table->string('applicant_name');
            $table->string('applicant_email')->nullable();
            $table->string('applicant_phone')->nullable();
            $table->string('applicant_address')->nullable();
            $table->string('expected_salary')->nullable()->default('0.00');
            $table->text('description');
            $table->foreignId('status_id')->constrained('ref_statuses');
            $table->text('evaluation_remark')->nullable();
            $table->foreignUlid('evaluated_by')->nullable()->constrained('users');
            $table->dateTime('evaluated_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
