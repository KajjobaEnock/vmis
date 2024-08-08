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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('details')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedInteger('supervisor')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('band_id')->nullable();
            $table->unsignedInteger('team_id')->nullable();
            $table->unsignedInteger('categorization_one_id')->nullable();
            $table->unsignedInteger('categorization_two_id')->nullable();
            $table->string('created_by');
            $table->string('modified_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
