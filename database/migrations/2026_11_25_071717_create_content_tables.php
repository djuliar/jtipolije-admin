<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('active')->nullable()->default(1);
            $table->integer('parent_id')->nullable()->default(0);
            $table->unsignedInteger('lft')->nullable();
            $table->unsignedInteger('rgt')->nullable();
            $table->unsignedInteger('depth')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->default('');
            $table->text('content');
            $table->unsignedInteger('category_id');
            $table->text('image')->nullable();
            $table->integer('user_id')->nullable()->default(1);
            $table->integer('editable')->nullable()->default(1);
            $table->integer('user_id_last_edit')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_author')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('og_image')->nullable();
            $table->text('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('status')->nullable()->default(0);
            $table->integer('read_count')->nullable()->default(0);
            $table->integer('active')->nullable()->default(0);
            $table->timestamp('date')->nullable()->useCurrent();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('tag_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_tag');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categories');
    }
};
