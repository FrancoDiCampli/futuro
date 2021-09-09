<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('looking_for');
            $table->string('hiring');
            $table->string('available');
            $table->string('country');
            $table->string('schedule');
            $table->string('paid');
            $table->string('pretended')->nullable();
            $table->json('skills');
            $table->boolean('enterprise');
            $table->boolean('visible');
            $table->timestamp('expired_at');
            $table->foreignId('city_id')->constrained();
            $table->foreignId('subcategory_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
