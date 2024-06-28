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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->unsignedBigInteger('kamar_id');
            $table->unsignedBigInteger('tamu_id');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
            $table->foreign('tamu_id')->references('id')->on('tamus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
