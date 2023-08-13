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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable();
            $table->string('othernames')->nullable();
            $table->string('institution')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('email')->nullable()->uniqid();
            $table->string('address');
            $table->longText('details');
            $table->string('image1');
            $table->string('image2');
            $table->string('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
