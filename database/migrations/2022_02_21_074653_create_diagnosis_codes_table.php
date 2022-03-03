<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosisCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('secondary_id');
            $table->foreignId('parent_id')->constrained('diagnosis_codes');
            $table->boolean('active')->default(true);
            $table->string('code');
            $table->integer('level');
            $table->boolean('is_last_level');

            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->softDeletes();
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
        Schema::dropIfExists('diagnoses');
    }
}
