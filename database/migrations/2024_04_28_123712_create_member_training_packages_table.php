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
        Schema::create('member_training_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('coache_id');
            $table->unsignedBigInteger('training_package_id');
            $table->unsignedBigInteger('package_session_id');
            $table->date('join_date')->default(DB::raw('CURRENT_DATE'));
            $table->date('expire_date');
            $table->decimal('price');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('coache_id')->references('id')->on('coaches')->onDelete('cascade');
            $table->foreign('training_package_id')->references('id')->on('training_packages')->onDelete('cascade');
            $table->foreign('package_session_id')->references('id')->on('package_sessions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_training_packages');
    }
};
