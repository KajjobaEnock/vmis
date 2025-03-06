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
        Schema::create('ex_combatants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->unsignedInteger('rank_id');
            $table->string('claimant_name');
            $table->string('nin')->unique();
            $table->string('village')->nullable();
            $table->unsignedInteger('parish_id')->nullable();
            $table->float('amount')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable()->unique();
            $table->string('bank')->nullable();
            $table->string('telephone')->nullable();
            $table->boolean('living_status')->default(1);
            $table->boolean('file_status')->default(1);
            $table->longText('remarks')->nullable();
            $table->string('father_name')->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->dateTime('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ex_combatants');
    }
};
