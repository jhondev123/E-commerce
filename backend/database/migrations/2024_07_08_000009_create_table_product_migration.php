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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 100);
            $table->float('price');
            $table->integer('deleted')->default(0);
            // $table->unsignedInteger('grupo_id');
            // $table->unsignedInteger('department_id');
            
            // // Foreign keys
            // $table->foreign('grupo_id')->references('id')->on('grupo');
            // $table->foreign('department_id')->references('id')->on('department');
            $table->foreignId('grupo_id')->constrained();
            $table->foreignId('departament_id')->constrained();


            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['grupo_id']);
            $table->dropForeign(['department_id']);
        });
        Schema::dropIfExists('products');
    }
};
