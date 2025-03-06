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
        Schema::create('veterans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('entry_date')->nullable();
            $table->date('date')->nullable();
            $table->unsignedInteger('sub_county_id')->nullable();
            $table->string('parish')->nullable();
            $table->string('village')->nullable();
            $table->string('army_unit_id')->nullable();
            $table->string('brigade_id')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('rank_id')->nullable();
            $table->string('army_number')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('prd_disch')->nullable();
            $table->string('batch')->nullable();
            $table->string('created_by');
            $table->string('modified_by')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->dateTime('reviewed_at')->nullable();
            $table->string('approved_by')->nullable();
            $table->dateTime('approved  _at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterans');
    }
};
