<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transactions', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('users_id')->nullable();

	        // payment
	        $table->string('status')->nullable();
	        $table->string('subtotal')->nullable();
	        $table->string('delivery_fee')->nullable();
	        $table->string('total_amount')->nullable();
	        $table->string('payment_method')->nullable();
	        $table->string('cc_type')->nullable();
	        $table->string('cc_number')->nullable();
	        $table->string('cc_expiry')->nullable();

	        // basic info
	        $table->string('first_name')->nullable();
	        $table->string('last_name')->nullable();
	        $table->string('email')->nullable();
	        $table->string('mobile_number')->nullable();

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
        Schema::dropIfExists('Transactions');
    }
}
