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
        Schema::create('food_list', function (Blueprint $table) {
            $table->id();
            $table->string('foodName');
            $table->double('calories');
            $table->double('protein');
            $table->double('fat');
            $table->double('hydrate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_list');
    }
};
