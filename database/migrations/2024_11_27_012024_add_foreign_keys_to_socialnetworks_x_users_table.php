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
        Schema::table('socialnetworks_x_users', function (Blueprint $table) {
            $table->foreign(['fk_socialNetwork'], 'fk_social_networks_has_users_social_networks1')->references(['id_socialNetwork'])->on('social_networks')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['fk_user'], 'fk_social_networks_has_users_users1')->references(['user_id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('socialnetworks_x_users', function (Blueprint $table) {
            $table->dropForeign('fk_social_networks_has_users_social_networks1');
            $table->dropForeign('fk_social_networks_has_users_users1');
        });
    }
};
