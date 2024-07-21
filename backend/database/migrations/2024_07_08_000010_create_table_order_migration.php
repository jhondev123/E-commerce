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
            $table->increments('id');  // unsigned integer

            $table->float('price');
            $table->float('discount')->default(0);

            $table->foreignId('user_id')->constrained();
            $table->foreignId('address_id')->constrained();


            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Remove foreign key constraints
            $table->dropForeign(['user_id']);
            $table->dropForeign(['address_id']);
        });

        Schema::dropIfExists('order');

        Schema::dropIfExists('order');
    }
};
