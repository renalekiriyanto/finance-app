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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('investment_id')->constrained()->onDelete('restrict');
            $table->foreignId('destination_account_id')->constrained('accounts')->onDelete('restrict');
            $table->decimal('withdrawal_amount', 15, 2); // Jumlah yang ditarik dari investasi
            $table->decimal('admin_fee', 15, 2)->nullable(); // Biaya admin (manual input)
            $table->decimal('received_amount', 15, 2); // Jumlah yang diterima di rekening
            $table->decimal('calculated_admin_fee', 15, 2)->nullable(); // Biaya admin otomatis
            $table->date('withdrawal_date');
            $table->date('received_date')->nullable();
            $table->string('status')->default('pending'); // pending, completed, failed
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawls');
    }
};
