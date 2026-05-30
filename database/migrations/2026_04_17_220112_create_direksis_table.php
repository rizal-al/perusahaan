<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('direksis', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('email')->unique();
        $table->string('jabatan');
        $table->string('id_perusahaan');
        $table->string('password');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('direksis');
}
};
