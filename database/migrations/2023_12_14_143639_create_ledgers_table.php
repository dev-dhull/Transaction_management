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
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('bill_no');
            $table->float('total_amount')->nullable();
            $table->float('total_credit')->default(0)->nullable();
            $table->float('total_due')->default(0)->nullable();
            $table->integer('labour')->nullable();
            $table->integer('bardana')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->float('interest_amount')->default(0)->nullable();
            $table->boolean('due_date')->default(false)->comment('after 15 days, 1=>3days, 0=>15days');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledgers');
    }
};
