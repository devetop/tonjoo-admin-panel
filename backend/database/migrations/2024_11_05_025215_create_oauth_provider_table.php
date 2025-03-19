<?php

use App\Models\User;
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
        Schema::create('oauth_providers', function (Blueprint $table) {
            $table->id();
            $table->string('provider_id');
            $table->string('provider_name');
            $table->foreignIdFor(User::class, 'user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable(false)->change();
        });

        Schema::dropIfExists('oauth_providers');
    }
};
