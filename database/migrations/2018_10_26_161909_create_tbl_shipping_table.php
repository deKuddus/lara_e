<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_fname');
            $table->string('customer_lname');
            $table->string('customer_email')->unique();
            $table->string('customer_phone');
            $table->string('customer_address1');
            $table->string('customer_address2')->nullable();
            $table->string('customer_city');
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
        Schema::dropIfExists('tbl_shipping');
    }
}
