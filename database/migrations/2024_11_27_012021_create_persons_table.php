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
        Schema::create('persons', function (Blueprint $table) {
            $table->integer('id_person', true);
            $table->integer('fk_gender')->index('fk_persons_genders1_idx');
            $table->integer('fk_nationality')->index('fk_persons_nationalities1_idx');
            $table->string('person_identification', 100)->unique('person_identification_unique');
            $table->string('person_img', 200);
            $table->string('person_name', 200);
            $table->string('person_lastname', 200);
            $table->date('person_birthDate');
            $table->string('person_description', 500);
            $table->string('person_address', 500);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
