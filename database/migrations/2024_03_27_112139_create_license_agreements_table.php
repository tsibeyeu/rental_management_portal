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
        Schema::create('license_agreements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_tenant_id');
            $table->date('start_date');
            $table->date('expire_date');
            $table->decimal('price');
            $table->boolean('license_status');
            $table->timestamps();

            $table->foreign('room_tenant_id')->references('id')->on('room_tenants')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_agreements');
    }
};
