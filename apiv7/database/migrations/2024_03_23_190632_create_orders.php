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
        Schema::create('orders', function (Blueprint $table) {
             $table->id();
             $table->string('amblnc_number');
             $table->string('brand');
             $table->string('route');
             $table->string('price');
             $table->string('clientName');
             $table->string('address');
             $table->string('phone');
             $table->string('accountNo');
             $table->string('payMethod');
             $table->string('amount');
              $table->string('confirm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
