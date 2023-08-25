<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            // $table->foreign('role_id')->nullable()->references('id')->on('roles');
            $table->foreignId('role_id')->nullable()->constrained('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('is_active')->default(false);
            $table->string('type');
            $table->string('department')->nullable();
            $table->string('job_description')->nullable();
            $table->boolean('is_otp_verified')->default(false);
            $table->string('verification_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 'admin',
                'phone' => '09000000000',
                'role_id' => 1,
                'is_active' => 1,
                'email_verified_at' => date_create('now')->format('Y-m-d H:i:s'),
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
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
}
