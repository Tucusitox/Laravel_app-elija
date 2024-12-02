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
        Schema::create('nationalities', function (Blueprint $table) {
            $table->integer('id_nationality', true);
            $table->string('nationality_name', 100);
            $table->string('nationality_regex', 500);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nationalities');
    }
};
