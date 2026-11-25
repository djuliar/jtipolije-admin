<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laboratorium', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('alias', 20)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('chairman')->nullable();
            $table->text('image')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('website')->nullable();
            $table->text('address')->nullable();
            $table->text('additional')->nullable();
            $table->unsignedInteger('active')->nullable()->default(1);
            $table->timestamps();
        });

        Schema::create('lab_inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('condition')->nullable();
            $table->unsignedInteger('lab_id')->nullable();
            $table->timestamps();
        });

        Schema::create('lab_dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('number', 50)->nullable();
            $table->string('name', 100)->nullable();
            $table->text('link')->nullable();
            $table->text('file')->nullable();
            $table->unsignedInteger('lab_id')->nullable();
            $table->timestamps();
        });

        Schema::create('lab_garis', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->unsignedInteger('leader')->nullable();
            $table->text('team')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('lab_id')->nullable();
            $table->timestamps();
        });

        Schema::create('lab_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->text('image')->nullable();
            $table->unsignedInteger('lab_id')->nullable();
            $table->timestamps();
        });

        Schema::create('lab_produk', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->text('link')->nullable();
            $table->text('team')->nullable();
            $table->unsignedInteger('lab_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_produk');
        Schema::dropIfExists('lab_kegiatan');
        Schema::dropIfExists('lab_garis');
        Schema::dropIfExists('lab_dokumen');
        Schema::dropIfExists('lab_inventaris');
        Schema::dropIfExists('laboratorium');
    }
};
