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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trader_id')->constrained('traders')->cascadeOnDelete();
            $table->string('written_at');
            $table->date('written_date');
            $table->string('salutation');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_day')->nullable();
            $table->integer('age')->nullable();
            $table->string('nationality', 100)->nullable();
            $table->string('house_number', 255)->nullable();
            $table->string('village', 255)->nullable();
            $table->string('alley', 255)->nullable();
            $table->string('road', 255)->nullable();
            $table->string('subdistrict', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('province', 255)->nullable();
            $table->char('postal_code', 5)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('citizen_id');
            $table->enum('marital_status', ['single', 'married', 'widowed', 'divorced', 'separated', 'other'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
