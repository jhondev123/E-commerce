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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 100);
            $table->float('price');
            $table->integer('deleted')->default(0);
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('department_id');
            
            // Foreign keys
            $table->foreign('group_id')->references('id')->on('group');
            $table->foreign('department_id')->references('id')->on('department');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            // Remove foreign key constraints
            $table->dropForeign(['group_id']);
            $table->dropForeign(['department_id']);
        });
        Schema::dropIfExists('product');
    }
};
