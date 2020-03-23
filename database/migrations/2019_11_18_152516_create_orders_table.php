<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orderID');
            $table->string('paymentID');
            $table->string('shippingID');
            $table->string('customerID');
            $table->string('productName');
            $table->string('productQty');
            $table->string('productPrice');
            $table->string('productTotal');
            $table->string('grandTotal');
            $table->string('paymentStat');
            $table->string('deliveryStat');
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
        Schema::dropIfExists('orders');
    }
}
