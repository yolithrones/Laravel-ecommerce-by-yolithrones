<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('town')->nullable();
            $table->string('state')->nullable();
            $table->string('postCode')->nullable();
            $table->string('address')->nullable();
            $table->string('apartment')->nullable();
            $table->string('productTitle')->nullable();
            $table->string('quantity')->nullable();
            $table->string('image')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->string('productId')->nullable();
            $table->string('userId')->nullable();
            $table->string('ordered')->nullable();
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
        Schema::dropIfExists('carts');
    }
};
