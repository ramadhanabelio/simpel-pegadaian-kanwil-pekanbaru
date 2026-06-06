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
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_memo')->nullable();

            $table->date('tanggal');

            $table->string('tujuan');
            $table->string('perihal');

            $table->longText('isi_memo');

            $table->enum('status', [
                'draft',
                'proses',
                'selesai'
            ])->default('draft');

            $table->string('lampiran')->nullable();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memos');
    }
};
