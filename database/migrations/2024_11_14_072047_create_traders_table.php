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
        Schema::create('traders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('trade_type', ['option_1', 'option_2']);
            $table->text('trade_condition')->nullable();
            $table->string('elderly_name');
            $table->string('citizen_id');
            $table->text('address')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->enum('status', ['1', '2']);
            $table->string('admin_name_verifier')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traders');
    }
};
