<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_price');
            $table->string('charge_token');
            $table->integer('user_id');
            $table->string('address')->nullable();
            $table->string('coupon_code')->nullable();
            $table->integer('coupon_type')->nullable();
            $table->integer('coupon_value')->nullable();
            $table->integer('actual_price')->nullable();
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
        Schema::dropIfExists('transfers');
    }
}
