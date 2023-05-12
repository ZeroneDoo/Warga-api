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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->string('no_ktp');
            $table->string('no_telepon')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jk', ['P', 'L'])->nullable();
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
