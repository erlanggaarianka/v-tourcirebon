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
        Schema::create('markers', function (Blueprint $table) {
            $table->id();
            $table->string('tempat');
            $table->text('keterangan');
            $table->integer('categories_id');
            $table->bigInteger('price');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('link');
            $table->string('navlink');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markers');
    }
};
