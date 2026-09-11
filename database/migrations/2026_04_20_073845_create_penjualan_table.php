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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->integer('total_pembayaran')->default(0);
            $table->string('metode_pembayaran')->default('CASH');
            
           // pembayaran //
            $table->integer('bayar')->default(0);
            $table->integer('kembalian')->default(0);
            
            $table->enum('status', ['OPEN', 'CLOSED', 'COMPLETED'])->default('OPEN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};