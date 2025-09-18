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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('image_id')->unsigned()->nullable();
            $table->string('unit_name')->nullable();
            $table->string('base_character_name')->nullable();
            $table->string('unit_type')->nullable();
            $table->tinyInteger('num_of_characters')->unsigned()->nullable();
            $table->string('era')->nullable();
            $table->string('affiliation')->nullable();
            $table->tinyInteger('force_available')->unsigned()->nullable();
            $table->tinyInteger('stamina')->unsigned()->nullable();
            $table->tinyInteger('unit_durability')->unsigned()->nullable();
            $table->tinyInteger('points_value')->unsigned()->nullable();
            $table->string('default_squad')->nullable();
            $table->tinyInteger('isOwned')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
