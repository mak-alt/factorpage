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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->tinyInteger('target')->default(0);
            $table->integer('sort')->default(0);
            $table->unsignedBigInteger('menu_id');
            $table->bigInteger('parent_id');

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            // $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
