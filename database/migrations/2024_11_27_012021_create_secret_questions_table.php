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
        Schema::create('secret_questions', function (Blueprint $table) {
            $table->integer('id_secretQuestion', true);
            $table->integer('fk_question')->index('fk_questions_has_users_questions1_idx');
            $table->integer('fk_user')->index('fk_questions_has_users_users1_idx');
            $table->string('answer', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secret_questions');
    }
};
