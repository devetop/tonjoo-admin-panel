<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->string('slug');
            $table->text('content')->nullable();
            $table->string('type')->default('post');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->enum('status', ['draft', 'publish']);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at', 'slug']);
            $table->index(['deleted_at', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
