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
        Schema::create('coache_attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coache_id');
            $table->boolean('check_in');
            $table->timestamps();

            $table->foreign('coache_id')->references('id')->on('coaches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coache_attendances');
    }
};
