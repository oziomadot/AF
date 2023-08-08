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
        Schema::create('donators', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('othernames');
            $table->string('insitution')->nullable();
            $table->string('phonenumber');
            $table->string('email')->uniqid();
            $table->foreignId('whattodonate_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('donators');
    }
};
