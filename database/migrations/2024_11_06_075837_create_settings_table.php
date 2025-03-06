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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('system_name')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('display_name')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->text('url')->nullable();
            $table->boolean('users_online')->default(1);
            $table->text('logo')->nullable();
            $table->text('favicon')->nullable();
            $table->text('header_color')->nullable();
            $table->boolean('alerts_enabled')->default(1);
            $table->longText('default_eula_text')->nullable();
            $table->string('mail_engine')->nullable();
            $table->string('mail_parameters')->nullable();
            $table->string('smtp_hostname')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_timeout')->nullable();
            $table->text('slogan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
