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
        Schema::create('socialnetworks_x_users', function (Blueprint $table) {
            $table->integer('id_socialNetwUser', true);
            $table->integer('fk_socialNetwork')->index('fk_social_networks_has_users_social_networks1_idx');
            $table->integer('fk_user')->index('fk_social_networks_has_users_users1_idx');
            $table->string('socialNetwUser_name', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socialnetworks_x_users');
    }
};
