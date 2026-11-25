<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('nip', 25)->nullable();
            $table->string('nidn', 30)->nullable();
            $table->unsignedInteger('prodi')->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->text('telepon')->nullable();
            $table->text('email')->nullable();
            $table->unsignedInteger('jabatan')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->string('golongan', 50)->nullable();
            $table->text('image')->nullable();
            $table->unsignedInteger('active')->nullable()->default(1);
            $table->integer('show_ttl')->nullable()->default(1);
            $table->integer('show_alamat')->nullable()->default(1);
            $table->integer('show_telepon')->nullable()->default(1);
            $table->integer('show_email')->nullable()->default(1);
            $table->string('scholar', 100)->nullable();
            $table->string('scopus', 100)->nullable();
            $table->string('sinta', 100)->nullable();
            $table->integer('user_id')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('lft')->nullable();
            $table->unsignedInteger('rgt')->nullable();
            $table->unsignedInteger('depth')->nullable();
            $table->timestamps();
        });

        Schema::create('teknisi', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('nip', 25)->nullable();
            $table->unsignedInteger('lab')->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->text('telepon')->nullable();
            $table->text('email')->nullable();
            $table->unsignedInteger('jabatan')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->string('golongan', 50)->nullable();
            $table->text('image')->nullable();
            $table->unsignedInteger('active')->nullable()->default(1);
            $table->unsignedInteger('show_ttl')->nullable()->default(1);
            $table->unsignedInteger('show_alamat')->nullable()->default(1);
            $table->unsignedInteger('show_telepon')->nullable()->default(1);
            $table->unsignedInteger('show_email')->nullable()->default(1);
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('lft')->nullable();
            $table->unsignedInteger('rgt')->nullable();
            $table->unsignedInteger('depth')->nullable();
            $table->timestamps();
        });

        Schema::create('administrasi', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('nip', 25)->nullable();
            $table->unsignedInteger('prodi')->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->text('telepon')->nullable();
            $table->text('email')->nullable();
            $table->unsignedInteger('jabatan')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->string('golongan', 50)->nullable();
            $table->text('image')->nullable();
            $table->unsignedInteger('active')->nullable()->default(1);
            $table->unsignedInteger('show_ttl')->nullable()->default(1);
            $table->unsignedInteger('show_alamat')->nullable()->default(1);
            $table->unsignedInteger('show_telepon')->nullable()->default(1);
            $table->unsignedInteger('show_email')->nullable()->default(1);
            $table->unsignedInteger('user_id')->nullable()->default(1);
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('lft')->nullable();
            $table->unsignedInteger('rgt')->nullable();
            $table->unsignedInteger('depth')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('administrasi');
        Schema::dropIfExists('teknisi');
        Schema::dropIfExists('dosen');
    }
};
