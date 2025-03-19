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
        Schema::table('terms', function (Blueprint $table) {
            $table->dropColumn('taxonomies');
            $table->unsignedBigInteger('taxonomy_id');
            $table->unsignedBigInteger('parent_term_id')->nullable()->change();

            $table->foreign('parent_term_id', 'terms_parent_term_id_foreign')->references('id')->on('terms');
            $table->foreign('taxonomy_id', 'terms_taxonomy_id_foreign')->references('id')->on('taxonomies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('terms', function (Blueprint $table) {
            $table->string('taxonomies', 20);
            $table->dropForeign([ 'parent_term_id' ]);

            //$table->bigInteger('parent_term_id')->change();
            $table->dropForeign([ 'taxonomy_id' ]);
            $table->dropColumn('taxonomy_id');
        });
    }
};
