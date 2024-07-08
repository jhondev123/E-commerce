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
        Schema::create('order', function (Blueprint $table) {
            $table->id;
            $table->float('price');
            $table->float('discount')->default(0);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('address_id')->nullable();
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');

            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            // Remove foreign key constraints
            $table->dropForeign(['user_id']);
            $table->dropForeign(['address_id']);
        });

        Schema::dropIfExists('order');

        Schema::dropIfExists('order');
    }
};
