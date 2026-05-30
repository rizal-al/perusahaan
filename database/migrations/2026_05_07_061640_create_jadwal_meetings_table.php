<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_meetings', function (Blueprint $table) {

            $table->id();

            $table->string('judul');

            $table->date('tanggal');

            $table->time('jam');

            $table->string('lokasi');

            $table->text('peserta');

            // agenda menyatu di tabel ini
            $table->longText('agenda')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_meetings');
    }
};