<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
Use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('gender')->nullable();
            $table->text('avatar')->nullable();
            $table->boolean('status')->default('0');
            $table->string('mobile_number')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->unsignedInteger('position_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('modified_by')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        User::create(['first_name' => 'Super', 'last_name' => 'Administrator', 'gender' => 'Male', 'status' => '1', 'position_id' => '1', 'department_id' => '1', 'email' => 'admin@example.com', 'username' => 'admin', 'password' => Hash::make('123456'),'email_verified_at'=>'2024-10-10 17:04:58','avatar' => 'avatar-1.jpg','created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
