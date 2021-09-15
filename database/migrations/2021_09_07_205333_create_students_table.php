<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('tos');
            $table->boolean('notification');
            $table->string('title');
            $table->string('experience');
            $table->string('university');
            $table->date('graduated_at');
            $table->float('average');
            $table->text('speech');
            $table->string('available');
            $table->string('preference');
            $table->json('skills');
            $table->string('courses');
            $table->string('hobbies');
            $table->string('website');
            $table->date('birthdate');
            $table->float('completed')->nullable();
            // $table->foreignId('subcategory_id')->constrained();
            $table->foreignId('city_id')->constrained();
           // $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('students');
    }
}
