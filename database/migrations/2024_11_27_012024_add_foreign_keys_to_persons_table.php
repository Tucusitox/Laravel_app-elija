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
        Schema::table('persons', function (Blueprint $table) {
            $table->foreign(['fk_gender'], 'fk_persons_genders1')->references(['id_gender'])->on('genders')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['fk_nationality'], 'fk_persons_nationalities1')->references(['id_nationality'])->on('nationalities')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->dropForeign('fk_persons_genders1');
            $table->dropForeign('fk_persons_nationalities1');
        });
    }
};
