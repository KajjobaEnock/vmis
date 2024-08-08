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
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->text('avatar')->nullable();
            $table->string('employee_number')->nullable();
            $table->string('nin')->nullable();
            $table->unsignedInteger('line_manager_id')->nullable();
            $table->boolean('status')->default('0');
            $table->unsignedInteger('employee_type_id')->nullable();
            $table->integer('tin')->nullable();
            $table->integer('nssf_number')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->string('office_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->float('amount')->nullable();
            $table->string('languages')->nullable();
            $table->string('skills')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->unsignedInteger('position_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('location_id')->nullable();
            $table->unsignedInteger('marital_status_id')->nullable();
            $table->string('nationality')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('modified_by')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('personal_email')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('insurance_number')->nullable();
            $table->unsignedInteger('employee_level_id')->nullable();
            $table->boolean('disability')->default(0);
            $table->longText('disability_details')->nullable();
            $table->boolean('illness')->default(0);
            $table->longText('illness_details')->nullable();
            $table->boolean('profile_status')->default(0);
            $table->dateTime('profile_date')->nullable();
            $table->boolean('personal_status')->default(0);
            $table->boolean('address_status')->default(0);
            $table->boolean('family_status')->default(0);
            $table->boolean('education_status')->default(0);
            $table->boolean('others_status')->default(0);
            $table->unsignedInteger('appraisal_type')->nullable();
            $table->string('current_village')->nullable();
            $table->string('current_town')->nullable();
            $table->string('current_district')->nullable();
            $table->string('permanent_village')->nullable();
            $table->string('permanent_subcounty')->nullable();
            $table->string('permanent_county')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->string('spouse_attachment')->nullable();
            $table->string('spouse_details')->nullable();
            $table->string('next_name')->nullable();
            $table->string('next_phone')->nullable();
            $table->string('next_address')->nullable();
            $table->string('next_relationship')->nullable();
            $table->string('next_details')->nullable();
            $table->string('father_name')->nullable();
            $table->enum('father_status', ['Alive', 'Deceased'])->nullable();
            $table->string('father_phone')->nullable();
            $table->text('father_address')->nullable();
            $table->text('father_details')->nullable();
            $table->string('mother_name')->nullable();
            $table->enum('mother_status', ['Alive', 'Deceased'])->nullable();
            $table->string('mother_phone')->nullable();
            $table->text('mother_address')->nullable();
            $table->text('mother_details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        User::create(['first_name' => 'Super', 'last_name' => 'Administrator', 'dob' => '2000-01-02', 'gender' => 'Male', 'employee_number' => '0001', 'nin' => '12345', 'line_manager_id' => '1', 'tin' => '9283', 'nssf_number' => '7568', 'joining_date' => '2020-01-01', 'status' => '1', 'employee_type_id' => '1', 'employee_level_id' => '1', 'position_id' => '1', 'location_id' => '1', 'marital_status_id' => '1', 'email' => 'admin@example.com', 'username' => 'admin', 'password' => Hash::make('123456'),'email_verified_at'=>'2022-10-10 17:04:58','avatar' => 'avatar-1.jpg','created_at' => now(),]);
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
