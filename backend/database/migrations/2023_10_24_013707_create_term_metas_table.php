<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms')->restrictOnUpdate()->restrictOnDelete();
            $table->string('key')->nullable();
            $table->text('value')->nullable();
            $table->boolean('is_serialized')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_metas');
    }
};
