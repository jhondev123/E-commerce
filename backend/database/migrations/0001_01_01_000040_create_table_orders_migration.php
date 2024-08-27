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
            $table->string('status');
            $table->float('total');
            // $table->timestamp('delivery_time');
            // $table->foreignId('delivery_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('payment_id')->constrained();
            $table->foreignId('payment_status_id')->constrained('payments_status');
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
            $table->dropForeign(['payment_status_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['payment_id']);
        });

        Schema::dropIfExists('orders');
    }
};
