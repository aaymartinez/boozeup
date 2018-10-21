<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');

            // profile
	        $table->integer('role_id')->nullable();
	        $table->string('shop_name')->nullable();
	        $table->string('first_name')->nullable();
	        $table->string('last_name')->nullable();
	        $table->string('mobile_number')->nullable();
	        $table->date('birth_date')->nullable();
	        $table->string('gender')->nullable();

	        // address
	        $table->string('unit_floor')->nullable();
	        $table->string('building')->nullable();
	        $table->string('street')->nullable();
	        $table->string('subdivision')->nullable();
	        $table->string('barangay')->nullable();
	        $table->string('city')->nullable();
	        $table->string('province')->nullable();
	        $table->integer('zip')->nullable();
	        $table->string('company_name')->nullable();
	        $table->string('landmarks')->nullable();
	        $table->string('authorized_recipient')->nullable();

	        // flags
	        $table->boolean('is_profile_complete')->default(false);

	        // Laravel Passport
	        $table->text('api_token');

	        // id verification
	        $table->string('id_verification')->nullable();

	        $table->rememberToken();
            $table->timestamps();
        });
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
