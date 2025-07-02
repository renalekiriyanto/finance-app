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
        Schema::create('admin_fee_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('investment_type_id')->constrained()->onDelete('restrict');
            $table->decimal('percentage', 5, 2)->nullable(); // Persentase biaya admin
            $table->decimal('fixed_amount', 15, 2)->nullable(); // Biaya tetap
            $table->decimal('minimum_fee', 15, 2)->nullable();
            $table->decimal('maximum_fee', 15, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_fee_settings');
    }
};
