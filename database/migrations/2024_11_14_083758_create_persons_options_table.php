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
        Schema::create('persons_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trader_id')->constrained('traders')->cascadeOnDelete();
            $table->string('welfare_type', 500); // ประเภทสวัสดิการ
            $table->string('welfare_other_types', 255)->nullable(); // รายละเอียดอื่นๆ
            $table->string('request_for_money_type', 500); // ประเภทการขอรับเงิน
            $table->string('document_type', 500); // ประเภทเอกสารที่แนบ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons_options');
    }
};
