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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('from_account_id')->constrained('accounts')->onDelete('restrict');
            $table->foreignId('to_account_id')->constrained('accounts')->onDelete('restrict');
            $table->decimal('amount', 15, 2);
            $table->decimal('transfer_fee', 15, 2)->default(0);
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('transfer_date');
            $table->string('reference_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
