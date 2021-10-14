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
            $table->string('slug');
            $table->text('description');
            $table->text('looking_for');
            $table->string('hiring');
            $table->string('available');
            $table->string('country');
            $table->string('schedule');
            $table->string('experience');
            $table->string('paid');
            $table->string('pretended')->nullable();
            $table->json('skills');
            $table->boolean('enterprise');
            $table->boolean('visible');
            $table->boolean('expired')->default(0);
            $table->timestamp('expired_at');
            $table->foreignId('city_id')->constrained();
            $table->foreignId('subcategory_id')->constrained();
            $table->foreignId('recruiter_id')->constrained();
            $table->foreignId('plan_id')->constrained();

            $table->string('status')->default('pending');

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
